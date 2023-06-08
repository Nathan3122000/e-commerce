<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/libs/css/auth.css') }}">
    <title>@yield('title','APP')</title>
</head>
<body style="background-image: url({{ asset('assets/images/bg.jpg') }}); background-size:cover; background-repeat:no-repeat; background-position:center; height:100%">
    <section class="ftco-section">
        @yield('content')
    </section>

    <script src="{{ asset('assets') }}/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script>
        	$(".toggle-password").click(function() {

                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                    } else {
                    input.attr("type", "password");
                }
            });
    </script>
	</body>
</html>

