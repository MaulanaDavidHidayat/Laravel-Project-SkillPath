<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Skill;
use App\Models\UserProgress;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $skills = Skill::latest()->take(3)->get();
        $skillCount = Skill::count();
        $lessonCount = Lesson::where('is_published', true)->count();

        $categories = [
            'Web Development',
            'Programming',
            'Design',
            'Database',
        ];

        $completedLessonIds = auth()->check()
            ? UserProgress::where('user_id', auth()->id())
                ->where('completed', true)
                ->pluck('lesson_id')
                ->all()
            : [];

        $learningPaths = collect();

        foreach ($categories as $category) {
            $categorySkills = Skill::where('category', $category)
                ->with([
                    'lessons' => fn ($query) => $query->where('is_published', true),
                ])
                ->get();

            $totalLessons = $categorySkills->sum(
                fn ($skill) => $skill->lessons->count()
            );

            $completedLessons = $categorySkills->sum(
                fn ($skill) => $skill->lessons
                    ->whereIn('id', $completedLessonIds)
                    ->count()
            );

            $progressPercentage = $totalLessons > 0
                ? round(($completedLessons / $totalLessons) * 100)
                : 0;

            if ($totalLessons === 0) {
                $status = 'Belum tersedia';
            } elseif ($completedLessons === 0) {
                $status = 'Belum dimulai';
            } elseif ($completedLessons >= $totalLessons) {
                $status = 'Selesai';
            } else {
                $status = 'Sedang dipelajari';
            }

            $learningPaths->push([
                'category' => $category,
                'skills' => $categorySkills,
                'totalLessons' => $totalLessons,
                'completedLessons' => $completedLessons,
                'progressPercentage' => $progressPercentage,
                'status' => $status,
            ]);
        }

        return view('home', [
            'skills' => $skills,
            'skillCount' => $skillCount,
            'lessonCount' => $lessonCount,
            'learningPaths' => $learningPaths,
        ]);
    }

public function skills(): View
{
    $skills = Skill::with([
        'lessons' => fn ($query) => $query->where('is_published', true),
    ])->latest()->get();

    $myLearning = collect();

    if (auth()->check()) {
        $completedLessonIds = UserProgress::where('user_id', auth()->id())
            ->where('completed', true)
            ->pluck('lesson_id');

        foreach ($skills as $skill) {
            $totalLessons = $skill->lessons->count();

            if ($totalLessons === 0) {
                continue;
            }

            $completedLessons = $skill->lessons
                ->whereIn('id', $completedLessonIds)
                ->count();

            if ($completedLessons === 0) {
                continue;
            }

            $progressPercentage = round(($completedLessons / $totalLessons) * 100);

            $myLearning->push([
                'skill' => $skill,
                'completedLessons' => $completedLessons,
                'totalLessons' => $totalLessons,
                'progressPercentage' => $progressPercentage,
            ]);
        }
    }

    return view('skills.index', [
        'skills' => $skills,
        'myLearning' => $myLearning,
    ]);
}

    public function show(Skill $skill): View
    {
        $skill->load([
            'lessons' => fn ($query) => $query->where('is_published', true),
        ]);

        $totalLessons = $skill->lessons->count();

        $completedLessonIds = auth()->check()
            ? UserProgress::where('user_id', auth()->id())
                ->whereIn('lesson_id', $skill->lessons->pluck('id'))
                ->where('completed', true)
                ->pluck('lesson_id')
                ->toArray()
            : [];

        $completedLessons = count($completedLessonIds);

        $progressPercentage = $totalLessons > 0
            ? round(($completedLessons / $totalLessons) * 100)
            : 0;

        return view('skills.show', [
            'skill' => $skill,
            'totalLessons' => $totalLessons,
            'completedLessons' => $completedLessons,
            'completedLessonIds' => $completedLessonIds,
            'progressPercentage' => $progressPercentage,
        ]);
    }

    public function lesson(Skill $skill, Lesson $lesson): View
    {
        abort_unless($lesson->skill_id === $skill->id, 404);

        $skillLessons = $skill->lessons()
            ->where('is_published', true)
            ->get();

        $totalLessons = $skillLessons->count();

        $completedLessons = auth()->check()
            ? UserProgress::where('user_id', auth()->id())
                ->whereIn('lesson_id', $skillLessons->pluck('id'))
                ->where('completed', true)
                ->count()
            : 0;

        $progressPercentage = $totalLessons > 0
            ? round(($completedLessons / $totalLessons) * 100)
            : 0;

        $isCompleted = auth()->check()
            ? UserProgress::where('user_id', auth()->id())
                ->where('lesson_id', $lesson->id)
                ->where('completed', true)
                ->exists()
            : false;

        return view('lessons.show', [
            'skill' => $skill,
            'lesson' => $lesson,
            'totalLessons' => $totalLessons,
            'completedLessons' => $completedLessons,
            'progressPercentage' => $progressPercentage,
            'isCompleted' => $isCompleted,
        ]);
    }
}