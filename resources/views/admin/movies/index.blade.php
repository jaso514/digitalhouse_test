@extends('admin.layouts.base')

@section('title', 'Digital House - Movies')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<div class="container">
    <div>
        <form action="{{ url()->current() }}" id="form">
            <fieldset>
                <div>
                    <label for="titulo">Titulo:</label>
                    <input type="text" name="titulo" id="titulo" value="{{ $title }}">
                </div>
                <div>
                    <button type="submit">Filtrar</button>
                </div>
            </fieldset>
        </form>
    </div>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Rating</th>
                    <th>Genre</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                <tr>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->rating }}</td>
                    <td>{{ $movie->genre->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{ $movies->links() }}
@endsection