<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <base href='/'>
        <link rel="stylesheet" href="/css/styles.css">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--   Fonts   -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

        {{-- bootstrap --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        
        <title>
            @yield('titlePage')
        </title>
    </head>

    <body class="d-flex   h-100 flex-column bg-light">
        @yield('content')
    </body>
    
    <script src="/js/scripts.js"></script>
<html>
