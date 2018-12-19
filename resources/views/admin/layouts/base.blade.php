<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>@yield('title')</title>
        
        @include('admin.layouts.styles')
    </head>
    <body>
        <div class="container-fluid h-100">
            @include('admin.layouts.header')
            <div class="row  h-100">
                @include('admin.layouts.sidebar', ['page' => isset($page)?$page:null])
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-2">
                    @yield('content')
                </main>
            </div>
            @include('admin.layouts.footer')
        </div>
        
        <!-- Scripts -->
        <script src="{{ asset('js/jquery.min.js') }}" ></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/jquery-ui.min.js') }}" defer></script>
        <script defer>
            $(document).ready(function(){
                $( ".datepicker" ).datepicker({'dateFormat': 'yy-mm-dd'});
            });
        </script>
    </body>
</html>