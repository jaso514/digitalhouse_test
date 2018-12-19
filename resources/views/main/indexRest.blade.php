@extends('layouts.main')

@section('content')
<div class="col-12 col-sm-9 m-auto">
    <div class="col-12 mt-3 ">
        @component('component.search', [
            'fields' => [
                'title' => [
                    'value' => "",
                    'title' => 'Titulo'
                ]
            ],
            'submitUrl' => "#",
            'clean' => false,
            'cleanRoute' => ""
        ])
        @endcomponent
    </div>

    <div class="row justify-content-center content-movies">
        
    </div>

    <div class="col-12 justify-content-center justify-content-center">
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item back">
                    <a class="page-link" href="#" tabindex="-1">
                        <i class="fas fa-angle-double-left"></i>&nbsp;
                    </a>
                </li>
                <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                <li class="page-item next">
                    <a class="page-link" href="#">&nbsp;<i class="fas fa-angle-double-right"></i></a>
                </li>
            </ul>
        </nav>
    </div>
    <div id="figure-base" hidden>
        @component('component.movie_item')
            @slot('info')
                <span class="figure-title"></span><br>
                <span class="figure-ranking"></span>/10<br>
                <small class="figure-genre"></small>
            @endslot
        @endcomponent
    </div>
</div>
@endsection
@section('scripts')
    @parent
    <script defer>
        $(document).ready(function(){
            var current = 1;
            function loader (page, filter) {
                page = page?page:1;
                let data = {};
                if (page) {
                    data.page = page;
                }
                if (filter) {
                    data.title = filter;
                }

                let ajx = $.ajax({
                    'type': "GET",
                    'url': "{{ route('movies.index') }}",
                    'data': data,
                    'dataType': "json"
                });

                ajx.done(function(msg){
                    if (msg.success) {
                        current = msg.data.current_page;
                        updatePagination(msg.data);
                        renderMovies(msg.data);
                    }
                });

                ajx.fail(function(msg){
                    $(".content-movies").empty();
                    $(".content-movies").append('No existen registros.');
                });
            }

            function renderMovies(response) {
                $(".content-movies").empty();
                if (response.total>0) {
                    for (i in response.data) {
                        let item = response.data[i];
                        let figure = $("#figure-base").children().clone();
                        figure.find(".figure-title").text(item.title);
                        figure.find(".figure-ranking").text(item.rating);
                        figure.find(".figure-genre").text(item.genre?item.genre.name:"");
                        
                        $(".content-movies").append(figure);
                    }
                } else {
                    $(".content-movies").append('No existen registros.');
                }
            }

            function updatePagination(response) {
                $(".pagination").find(".page-item.next").removeClass('disabled');
                $(".pagination").find(".page-item.back").removeClass('disabled');
                if (response.current_page==response.last_page) {
                    $(".pagination").find(".page-item.next").addClass('disabled');
                }
                if (response.current_page==1) {
                    $(".pagination").find(".page-item.back").addClass('disabled');
                }
            }

            $(".pagination").on("click", ".next", function(ev){
                ev.stopPropagation();
                ev.preventDefault();

                loader(current + 1, $("#title").val());
            });

            $(".pagination").on("click", ".back", function(ev){
                ev.stopPropagation();
                ev.preventDefault();

                loader(current - 1, $("#title").val());
            });

            $("#search-submit").click(function(ev){
                ev.preventDefault();
                ev.stopPropagation();

                if ($("#title").val()) {
                    loader(1, $("#title").val());
                }
            });
            
            loader(current, "");
        });
    </script>
@endsection