<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Employer Point</title>
        <link rel="stylesheet" href="{{ asset('/resource/startbootstrap-sb-admin-2/css/sb-admin-2.min.css') }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="app"></div>
        <script src="{{ asset('js/app.js') }}" ></script>
        <script src="{{ asset('/resource/startbootstrap-sb-admin-2/js/sb-admin-2.min.js') }}"></script>
    </body>
</html>
