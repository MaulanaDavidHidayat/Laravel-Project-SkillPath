<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Skill;
use App\Models\UserProgress;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $userId = auth()->id();

        $lessons = Lesson::where('is_published', true)->get();
        $totalLessons = $lessons->count();

        $completedLessonIds = UserProgress::where('user_id', $userId)
            ->where('completed', true)
            ->pluck('lesson_id');

        $completedLessons = $completedLessonIds->count();

        $progressPercentage = $totalLessons > 0
            ? round(($completedLessons / $totalLessons) * 100)
            : 0;

        $completedLessonIdsArray = $completedLessonIds->all();

        $completedSkillCount = Skill::with([
            'lessons' => fn ($query) => $query->where('is_published', true),
        ])->get()->filter(function ($skill) use ($completedLessonIdsArray) {
            $skillLessonIds = $skill->lessons->pluck('id');

            return $skillLessonIds->isNotEmpty()
                && $skillLessonIds->every(
                    fn ($lessonId) => in_array($lessonId, $completedLessonIdsArray)
                );
        })->count();

        $completedCategories = Skill::with([
            'lessons' => fn ($query) => $query->where('is_published', true),
        ])->get()->filter(function ($skill) use ($completedLessonIdsArray) {
            return $skill->lessons
                ->whereIn('id', $completedLessonIdsArray)
                ->isNotEmpty();
        })->pluck('category')
            ->filter()
            ->unique()
            ->count();

        $totalXp = ($completedLessons * 100) + ($completedSkillCount * 250);

        $badges = [];

        if ($completedLessons >= 1) {
            $badges[] = [
                'name' => 'First Step',
                'description' => 'Menyelesaikan lesson pertama.',
                'icon' => '✦',
            ];
        }

        if ($completedLessons >= 5) {
            $badges[] = [
                'name' => 'Learning Starter',
                'description' => 'Menyelesaikan 5 lesson.',
                'icon' => '◆',
            ];
        }

        if ($completedLessons >= 10) {
            $badges[] = [
                'name' => 'Skill Builder',
                'description' => 'Menyelesaikan 10 lesson.',
                'icon' => '◇',
            ];
        }

        if ($completedCategories >= 4) {
            $badges[] = [
                'name' => 'Category Explorer',
                'description' => 'Belajar dari 4 kategori skill.',
                'icon' => '◎',
            ];
        }

        if ($completedSkillCount >= 1) {
            $badges[] = [
                'name' => 'Skill Finisher',
                'description' => 'Menyelesaikan satu skill sampai tuntas.',
                'icon' => '✓',
            ];
        }

        if ($totalLessons > 0 && $completedLessons >= $totalLessons) {
            $badges[] = [
                'name' => 'Learning Master',
                'description' => 'Menyelesaikan seluruh lesson SkillPath.',
                'icon' => '★',
            ];
        }

        return view('dashboard', [
            'totalLessons' => $totalLessons,
            'completedLessons' => $completedLessons,
            'progressPercentage' => $progressPercentage,
            'totalXp' => $totalXp,
            'completedSkillCount' => $completedSkillCount,
            'completedCategories' => $completedCategories,
            'badges' => $badges,
            'badgeCount' => count($badges),
        ]);
    }
}