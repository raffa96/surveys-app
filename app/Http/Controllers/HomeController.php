<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $surveys = auth()->user()->surveys;

        return view('home', compact('surveys'));
    }
}
