<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="7; url={{ $url }}" />
    <title>Prodigy Sale</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap_5_1_3.css') }}">
</head>
<body class="log-in-background" >
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-lg-3 col-sm-2"></div>
                <div class="col-lg-6 col-md-6 col-sm-8">
                    <div class="card m-5">
                        <div class="card-body p-5">
                            <h1 class="text-center text-danger">You're not allowed to access this page!</h1>
                            <hr>
                            <p class="text-center"><a href="{{ $url }}">Click here</a> if you are not redirected in 5 seconds.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-2"></div>
            </div>
        </div>
</body>
</html>