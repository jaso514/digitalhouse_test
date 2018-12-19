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
        @include('layouts.header')
        <main role="main" class="container">
            @yield('content')
        </main>
        @include('layouts.footer')
        <!-- Scripts -->
        @section('scripts')
        <script src="{{ asset('js/jquery.min.js') }}" ></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        @show
    </body>
</html>