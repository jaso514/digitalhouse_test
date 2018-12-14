<html>
    <head>
        <title>App Name - @yield('title')</title>
        @include('admin.layouts.styles')
    </head>
    <body>
        
        <div class="container-fluid h-100">
            @include('admin.layouts.header')
            <div class="row">
                @include('admin.layouts.sidebar', ['page' => isset($page)?$page:null])
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </body>
</html>