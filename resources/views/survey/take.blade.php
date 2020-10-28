@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="text-center my-3">Compila il questionario: {{ $survey->title }}</h3>

                <form action="/survey/take/{{ $survey->id.'-'.Str::slug($survey->title) }}" method="post">
                    <div class="card my-3">
                        <div class="card-header">
                            <h3 class="card-title">Inserisci i tuoi dati</h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Nome</label>
                                        <input type="text" id="name" name="name" class="form-control"
                                               value="{{ old('name') }}">
                                    </div>

                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="surname">Cognome</label>
                                        <input type="text" id="surname" name="surname" class="form-control"
                                               value="{{ old('surname') }}">
                                    </div>

                                    @error('surname')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                       value="{{ old('email') }}">
                            </div>

                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    @foreach($survey->questions as $key => $question)
                        <div class="card my-3">
                            <div class="card-header">
                                <h3 class="card-title">{{ ++$key }}: {{ $question->question }}</h3>
                            </div>

                            <div class="card-body">
                                @if(sizeof($question->answers) == 0)
                                    <div class="alert alert-info" role="alert">
                                        Non ci sono risposte per questa domanda...
                                    </div>
                                @else
                                    @error('responses.'.$key.'.answer_id')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror


                                    @foreach($question->answers as $answer)
                                        <input type="hidden" name="responses[{{ $key }}][question_id]"
                                               value="{{ $question->id }}">

                                        <div class="form-check">
                                            <input type="radio" id="answer-{{ $answer->id }}"
                                                   name="responses[{{ $key }}][answer_id]"
                                                   class="form-check-input"
                                                   value="{{ $answer->id }}" {{ (old('responses.'.$key.'.answer_id') == $answer->id) ? 'checked' : '' }}>
                                            <label for="answer-{{ $answer->id }}"
                                                   class="form-check-label">{{ $answer->answer }}</label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endforeach

                    <div class="d-flex flex-row justify-content-center align-content-center my-3">
                        <button type="submit" class="btn btn-lg btn-outline-success">Compila</button>
                    </div>

                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection
