@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>I tuoi questionari</h2>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <ul class="list-group-flush m-0 p-0">
                            @foreach($surveys as $survey)
                                <li class="list-group-item p-0">
                                    <div
                                        class="w-100 d-flex flex-row justify-content-between align-items-center p-3 bg-dark text-white rounded">
                                        <div class="w-50">
                                            <h3>{{ $survey->title }}</h3>
                                            <small style="color: #2d995b; font-size: 0.8rem; font-style: italic;">
                                                Creato il {{ date('d/m/y', strtotime($survey->created_at)) }}
                                                alle {{ date('H:m:s', strtotime($survey->created_at)) }}
                                            </small>
                                        </div>

                                        <div class="w-25">
                                            <a class="btn btn-light" href="{{ url("/survey/".$survey->id) }}">
                                                VISUALIZZA
                                            </a>
                                        </div>

                                        <div class="w-25">
                                            <a class="btn btn-primary"
                                               href="{{url("/survey/take/".$survey->id."-".Str::slug($survey->title))}}">
                                                COMPILA
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                @if(!$loop->last)
                                    <hr>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <div class="card-footer">
                        <a href="{{ url("/survey/create") }}" class="btn btn-outline-dark">Nuovo questionario</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
