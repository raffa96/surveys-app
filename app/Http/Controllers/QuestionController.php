<?php

namespace App\Http\Controllers;

use App\Models\Survey;

class QuestionController extends Controller
{
    public function create(Survey $survey)
    {
        return view('question.create', compact('survey'));
    }

    public function store(Survey $survey)
    {
        $data = request()->validate([
            'question' => 'required',
            'answers.*.answer' => 'required'
        ]);

        $question = $survey->questions()->create(['question' => $data['question']]);

        $question->answers()->createMany($data['answers']);

        return redirect('/survey/' . $survey->id);
    }
}
