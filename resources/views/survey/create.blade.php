@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Crea il tuo questionario</h3>
                    </div>

                    <div class="card-body">
                        <form action="/survey/create" method="post">
                            <div class="form-group">
                                <label for="title">Titolo</label>
                                <input type="text" id="title" name="title" class="form-control"
                                       placeholder="Inserisci il titolo...">
                            </div>

                            @error('title')
                            <small class="text-danger my-3">{{ $message }}</small>
                            @enderror

                            <div class="form-group">
                                <label for="description">Descrizione</label>
                                <textarea id="description" name="description" rows="3" cols="6"
                                          class="form-control" placeholder="Inserisci la descrizione..."></textarea>
                            </div>

                            @error('description')
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
