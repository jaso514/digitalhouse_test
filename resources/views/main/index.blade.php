@extends('layouts.main')

@section('content')
<div class="col-12 col-sm-9 m-auto">
    <div class="col-12 mt-3 ">
        @component('component.search', [
            'fields' => [
                'title' => [
                    'value' => $title,
                    'title' => 'Titulo'
                ]
            ],
            'submitUrl' => url()->current(),
            'clean' => false,
            'cleanRoute' => route('index')
        ])
        @endcomponent
    </div>
    <div class="col-12 justify-content-center mt-3 ">
        {{ $movies->onEachSide(2)->links() }}
    </div>
    <div class="row justify-content-center">
        @foreach ($movies as $movie)
            @component('component.movie_item')
                @slot('info')
                    {{ $movie->title }}<br>
                    ({{ $movie->rating . '/10' }})<br>
                    <small>{{ $movie->genre?$movie->genre->name:" " }}</small>
                @endslot
            @endcomponent
        @endforeach
    </div>
    <div class="col-12 justify-content-center">
        {{ $movies->onEachSide(2)->links() }}
    </div>
</div>
@endsection
