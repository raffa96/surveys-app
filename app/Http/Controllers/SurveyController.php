<?php

namespace App\Http\Controllers;

use App\Models\Survey;

class SurveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['take', 'takeStore']);
    }

    public function create()
    {
        return view('survey.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $survey = auth()->user()->surveys()->create($data);

        return redirect('/survey/' . $survey->id);
    }

    public function show(Survey $survey)
    {
        return view('survey.show', compact('survey'));
    }

    public function take(Survey $survey)
    {
        return view('survey.take', compact('survey'));
    }

    public function takeStore(Survey $survey)
    {
        $data = request()->validate([
            'name' => 'required | min: 3',
            'surname' => 'required | min: 3',
            'email' => 'required | email',
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required'
        ]);

        $surveyCompilation = $survey->surveyCompilations()->create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email']
        ]);

        $surveyCompilation->responses()->createMany($data['responses']);

        return view('survey.success');
    }
}
