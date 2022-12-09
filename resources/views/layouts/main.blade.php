<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" href="/images/shop.png">
    <title>Sayur Shop | {{ $title }}</title>
   @include('home.layout.css')

</head>


<body class="navbar-fixed text-dark" id="body">


    <div class="wrapper">

        <div class="page-wrapper">

            <!-- Header -->
            @include('home.layout.navbar')
            {{-- <div class="container"> --}}
            {{-- <div style="margin-top: 50px"> --}}
            @yield('content')
            {{-- </div> --}}
        </div>

    </div>
@include('home.layout.js')
</body>

</html>
