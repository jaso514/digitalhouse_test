@extends('admin.layouts.base')

@section('title', 'Digital House - Movies')

@section('sidebar')
    @parent
@endsection

@section('content')
<form action="{{ route('admin_movies_save') }}" method="POST" class="col">
    <fieldset>
    <legend>Agregar Pelicula</legend>
    <div class="row">
        @csrf
        <div class="col-12 col-sm-6 form-group">
            <label for="movies_rating">Titulo</label>
            <input type="text" class="form-control" name="movies[title]" id="movies_rating"
                aria-describedby="helpId" placeholder="">
        </div>

        <div class="col-12 col-sm-6 form-group">
            <label for="movies_awards">Cantidad de premios</label>
            <input type="text" class="form-control" name="movies[awards]" id="movies_awards" 
                aria-describedby="helpId" placeholder="">
        </div>

        <div class="col-12 col-sm-6 form-group">
            <label for="movies_release_date">Fecha de lanzamiento</label>
            <input type="text" class="form-control datepicker" name="movies[release_date]" id="movies_release_date" 
                aria-describedby="helpId" placeholder="">
        </div>

        <div class="col-12 col-sm-6 form-group">
            <label for="movies_length">Duración (mins)</label>
            <input type="number" class="form-control" name="movies[length]" id="movies_length" 
                aria-describedby="helpId" placeholder="">
        </div>

        <div class="col-12 col-sm-6 form-group">
            <label for="movies_genre">Género</label>
            <select class="custom-select custom-select-md" name="movies[genre]" id="movies_genre">
                <option selected>Seleccione...</option>
                @foreach ($genres as $id => $genre)
            <option value="{{ $id }}">{{ $genre }}</option>
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