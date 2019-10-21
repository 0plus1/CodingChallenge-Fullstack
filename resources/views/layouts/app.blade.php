<!doctype html>
<html lang="en">
<head>
    <title>Coding Challenge!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Styles -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    @yield('style')
</head>
<body>

<div class="container-fluid">
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ elixir('js/app.js') }}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@yield('script-bottom')

</body>
</html>