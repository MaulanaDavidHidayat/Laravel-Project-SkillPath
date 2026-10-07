<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\UserProgress;
use Illuminate\View\View;

class RoadmapController extends Controller
{
    public function index(): View
    {
        $skills = Skill::with([
            'lessons' => fn ($query) => $query
                ->where('is_published', true)
                ->orderBy('order'),
        ])->orderBy('id')->get();

        $completedLessonIds = UserProgress::where('user_id', auth()->id())
            ->where('completed', true)
            ->pluck('lesson_id')
            ->all();

        $completedLessons = count($completedLessonIds);
        $totalLessons = $skills->sum(fn ($skill) => $skill->lessons->count());

        $progressPercentage = $totalLessons > 0
            ? round(($completedLessons / $totalLessons) * 100)
            : 0;

        $skills = $skills->map(function ($skill) use ($completedLessonIds) {
            $totalSkillLessons = $skill->lessons->count();

            $completedSkillLessons = $skill->lessons
                ->whereIn('id', $completedLessonIds)
                ->count();

            $skillProgress = $totalSkillLessons > 0
                ? round(($completedSkillLessons / $totalSkillLessons) * 100)
                : 0;

            if ($skillProgress >= 100 && $totalSkillLessons > 0) {
                $status = 'completed';
            } elseif ($completedSkillLessons > 0) {
                $status = 'progress';
            } else {
                $status = 'available';
            }

            $skill->completed_lessons = $completedSkillLessons;
            $skill->total_lessons = $totalSkillLessons;
            $skill->progress_percentage = $skillProgress;
            $skill->roadmap_status = $status;

            return $skill;
        });

        $completedSkills = $skills
            ->where('roadmap_status', 'completed')
            ->count();

        $inProgressSkills = $skills
            ->where('roadmap_status', 'progress')
            ->count();

        $categories = $skills
            ->pluck('category')
            ->filter()
            ->unique()
            ->values();

        return view('roadmap', [
            'skills' => $skills,
            'completedLessons' => $completedLessons,
            'totalLessons' => $totalLessons,
            'progressPercentage' => $progressPercentage,
            'completedSkills' => $completedSkills,
            'inProgressSkills' => $inProgressSkills,
            'categoryCount' => $categories->count(),
        ]);
    }
}