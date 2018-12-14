@extends('admin.layouts.base')

@section('title', 'Digital House - Movies')

@section('sidebar')
    @parent
@endsection

@section('content')
<div class="row mt-3 justify-content-end">
    <form action="{{ url()->current() }}" id="form" class="form-inline">
        <div class="input-group">
            <label for="titulo" class="sr-only">Buscar</label>&nbsp;
            <input type="text" name="titulo" id="titulo" value="{{ $title }}"
                placeholder="Titulo" class="form-control mr-sm-2">
            <button type="submit" class="btn btn-primary mb-2">Filtrar</button>
        <div class="col-12 text-right">
            <a href="{{ route('admin_movies') }}">
                <small>Limpiar filtro</small>
            </a>
        </div>
        </div>
    </form>
</div>

@include('admin.layouts.list_summary', ['pagination' => $movies])

<div class="row">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Puntuación</th>
                <th>Género</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
            <tr>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->rating }}</td>
                <td>{{ $movie->genre?$movie->genre->name:"---" }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{ $movies->links() }}

@endsection