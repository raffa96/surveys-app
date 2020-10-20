@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Crea la tua domanda</h3>
                    </div>

                    <div class="card-body">
                        <form action="/survey/{{ $survey->id }}/question/create" method="post">
                            <div class="form-group">
                                <label for="question">Domanda</label>
                                <input type="text" id="question" name="question" class="form-control"
                                       placeholder="Inserisci qui la tua domanda..." value="{{ old('question') }}">
                            </div>

                            @error('question')
                            <small class="text-danger my-3">{{ $message }}</small>
                            @enderror

                            <div class="form-group">
                                <label for="answer1">Scelta 1</label>
                                <input type="text" id="answer1" name="answers[][answer]" class="form-control" value="">
                            </div>

                            @error('answers.0.answer')
                            <small class="text-danger my-3">{{ $message }}</small>
                            @enderror

                            <div class="form-group">
                                <label for="answer2">Scelta 2</label>
                                <input type="text" id="answer2" name="answers[][answer]" class="form-control" value="">
                            </div>

                            @error('answers.1.answer')
                            <small class="text-danger my-3">{{ $message }}</small>
                            @enderror

                            <div class="form-group">
                                <label for="answer3">Scelta 3</label>
                                <input type="text" id="answer3" name="answers[][answer]" class="form-control" value="">
                            </div>

                            @error('answers.2.answer')
                            <small class="text-danger my-3">{{ $message }}</small>
                            @enderror

                            <div class="d-flex flex-row justify-content-center align-content-center">
                                <button type="submit" class="btn btn-lg btn-outline-success">Crea</button>
                            </div>

                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

