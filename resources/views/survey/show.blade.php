@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="card my-3">
                    <div class="card-header">
                        <h3 class="card-title m-0">{{ $survey->title }}</h3>
                    </div>

                    <div class="card-body">
                        <p class="lead text-justify">{{ $survey->description }}</p>

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
                            <button class="btn btn-outline-primary">Compila questionario</button>
                        </a>
                    </div>
                </div>

                @foreach($survey->questions as $question)
                    <div class="card my-3">
                        <div class="card-header d-flex flex-row justify-content-between align-items-center">
                            <div>
                                <h3 class="card-title m-0">{{ $question->question }}</h3>
                            </div>

                            <div>
                                <span class="badge badge-pill badge-primary p-2">
                                    {{ $question->responses->count() > 0 ? 'Numero risposte: '.$question->responses->count() : 'Nessuna risposta' }}
                                </span>
                            </div>
                        </div>

                        <div class="card-body">
                            @if(sizeof($question->answers) == 0)
                                <div class="alert alert-info" role="alert">
                                    Non ci sono risposte per questa domanda...
                                </div>
                            @else
                                <ul class="list-group">
                                    @foreach($question->answers as $answer)
                                        <li class="list-group-item d-flex flex-row justify-content-between align-items-center">
                                            <div>{{ $answer->answer }}</div>

                                            @if($question->responses->count() > 0)
                                                <div>
                                                    <span class="badge badge-pill badge-dark p-2">
                                                        {{ intval($answer->responses->count()*100/$question->responses->count()) }}%
                                                    </span>
                                                </div>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                        <div class="card-footer d-flex flex-row justify-content-center">
                            <form action="/survey/{{ $survey->id }}/question/{{ $question->id }}" method="post">
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger">ELIMINA</button>
                                @csrf
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

