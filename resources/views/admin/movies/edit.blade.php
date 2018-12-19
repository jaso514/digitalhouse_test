@extends('admin.layouts.base')

@section('title', 'Digital House - Movies')

@section('sidebar')
    @parent
@endsection

@section('content')
<form action="{{ route('admin_movies_update', ['movies' => $movie->id]) }}" method="POST" class="col">
    <fieldset>
    <legend>Agregar Pelicula</legend>
    @if ($errors->any())
        <div class="row">
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="row">
        @csrf
        <div class="col-12 col-sm-6 form-group">
            <label for="movies_title">Titulo</label>
            <input type="text" class="form-control" name="movies[title]" id="movies_title"
                aria-describedby="helpId" placeholder="" value="{{ $movie->title }}">
        </div>

        <div class="col-12 col-sm-6 form-group">
            <label for="movies_awards">Cantidad de premios</label>
            <input type="text" class="form-control" name="movies[awards]" id="movies_awards" 
                aria-describedby="helpId" placeholder="" value="{{ $movie->awards }}">
        </div>

        <div class="col-12 col-sm-6 form-group">
            <label for="movies_release_date">Fecha de lanzamiento</label>
            <input type="text" class="form-control datepicker" name="movies[release_date]" id="movies_release_date" 
                aria-describedby="helpId" placeholder="" value="{{ $movie->release_date }}">
        </div>

        <div class="col-12 col-sm-6 form-group">
            <label for="movies_length">Duración (mins)</label>
            <input type="number" min="1" max="400" class="form-control" name="movies[length]" id="movies_length" 
                aria-describedby="helpId" placeholder="" value="{{ $movie->length }}">
        </div>

        <div class="col-12 col-sm-6 form-group">
            <label for="movies_length">Puntuación</label>
            <input type="number" step="0.1" class="form-control" name="movies[rating]" id="movies_rating" 
                aria-describedby="helpId" placeholder="" value="{{ $movie->rating }}">
        </div>

        <div class="col-12 col-sm-6 form-group">
            <label for="movies_genre">Género</label>
            <select class="custom-select custom-select-md" name="movies[genre_id]" id="movies_genre">
                <option>Seleccione...</option>
                @foreach ($genres as $id => $genre)
                    @if ($movie->genre_id==$id)
                        <option value="{{ $id }}" selected>{{ $genre }}</option>
                    @else
                        <option value="{{ $id }}">{{ $genre }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-6 text-center">
            <a href="" class="btn btn-outline-secondary">
                <i class="fa fa-backward" aria-hidden="true"></i> Volver
            </a>
        </div>
        <div class="col-6 text-center">
            <button class="btn btn-success" type="submit">Enviar</button>
        </div>
    </div>
    </fieldset>
</form>
@endsection