<?php

namespace App\Http\Controllers;

use App\Question;
use App\User;

class QuestionsController extends Controller
{
    public function store(User $user)
    {
        $user->questions()->create(request()->all());

        return back();
    }

    public function update(User $user, $question_id)
    {
        $user->questions()->find($question_id)->update(request()->all());

        return back();
    }

    public function delete(Question $question)
    {
        $question->delete();

        return back();
    }
}
