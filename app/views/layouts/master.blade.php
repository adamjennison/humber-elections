<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
    <body class="tk-active">

        @include('includes.header')
        
        <div id="main">
            @yield('content')
        </div>

        @include('includes.footer')
      
    </body>
</html>