@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="card mb-2">
                    <div class="card-header">
                        <h3 class="card-title" style="color: #1b4b72;">Questionario: {{ $survey->title }}</h3>
                    </div>

                    <div class="card-body">
                        <p class="lead">
                            <span style="color: #ae1c17; font-weight: bold;">Descrizione:</span>
                            {{ $survey->description }}
                        </p>

                        <small style="color: #2d995b; font-size: 0.8rem; font-style: italic;">
                            Creato il {{ date('d/m/y', strtotime($survey->created_at)) }}
                            alle {{ date('H:m:s', strtotime($survey->created_at)) }}
                        </small>
                    </div>

                    <div class="card-footer">
                        <a href="/survey/{{ $survey->id }}/question/create">
                            <button class="btn btn-outline-dark">Nuova domanda</button>
                        </a>

                        <a href="/survey/take/{{ $survey->id.'-'.Str::slug($survey->title) }}">
                            <button class="btn btn-outline-secondary">Compila questionario</button>
                        </a>
                    </div>
                </div>

                @foreach($survey->questions as $question)
                    <div class="card mt-2">
                        <div class="card-header">
                            <h3 class="card-title">Domanda: {{ $question->question }}</h3>
                        </div>

                        <div class="card-body">
                            @if(sizeof($question->answers) == 0)
                                <div class="alert alert-info" role="alert">
                                    Non ci sono risposte per questa domanda...
                                </div>
                            @else
                                <ul class="list-group-flush">
                                    @foreach($question->answers as $answer)
                                        <li class="list-group-item">{{ $answer->answer }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

