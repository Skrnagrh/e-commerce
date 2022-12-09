<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="/images/shop.png">
    <title>Sayur Shop | Login</title>

    <!-- Custom fonts for this template-->
    <link href="/login/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/login/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/images/layout-login.svg');
            background-size: 100%;
            background-repeat: no-repeat;
            background-position: center;
        }
        @media screen and (max-width:900px) {
            body {
                background-image: url('/images/layout-login-hp.svg');
                background-size: 100%;
                background-repeat: no-repeat;
                background-position: center;
            }
            .container {
                margin-top: 80%;
            }
            .card{
                height: auto;
                width: auto
            }
        }
    </style>

</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-5">

                @yield('content')

            </div>

        </div>

    </div>

    <script src="/login/vendor/jquery/jquery.min.js"></script>
    <script src="/login/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/login/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="/login/js/sb-admin-2.min.js"></script>
</body>

</html>
