<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Skill;
use App\Models\UserProgress;
use Illuminate\Http\RedirectResponse;

class ProgressController extends Controller
{
    public function complete(Skill $skill, Lesson $lesson): RedirectResponse
    {
        abort_unless($lesson->skill_id === $skill->id, 404);

        UserProgress::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'lesson_id' => $lesson->id,
            ],
            [
                'completed' => true,
                'completed_at' => now(),
            ]
        );

        return back()->with('success', 'Lesson berhasil ditandai selesai.');
    }
}