<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
    <link href="{{url('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
    <link href="{{url('css/flexslider.css')}}" rel="stylesheet">
    <link href="{{url('css/templatemo-style.css')}}" rel="stylesheet">
</head>
<body>
    <div id="app">
      <!-- Header -->
      <div class="tm-header">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-4 col-sm-3 tm-site-name-container">
              <a href="{{url('/')}}" class="tm-site-name">
                <img src="{{url('img/sigahlogo.png')}}" alt="sigahlogo" height="60" width="60"> SIGAH
              </a>

            </div>
            <div class="col-lg-6 col-md-8 col-sm-9">
              <div class="mobile-menu-icon">
                    <i class="fa fa-bars"></i>
                  </div>
              <nav class="tm-nav">
              <ul>
                <li><a href="#"></a></li>
                <li><a href="#"> </a></li>
                <li><a href="{{url('/promo')}}" class="active">PROMO</a></li>
  							<li><a href="{{url('/login')}}" class="active">ACCOUNT</a></li>
              </ul>
            </nav>
            </div>
          </div>
        </div>
      </div>


    </section>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

              </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

    </div>
    <footer class="tm-black-bg">
    <div class="container">
      <div class="row">
        <p class="tm-copyright-text"> &copy; 2018 Grand Atma Hotel

        </p>
        <div class="li-footer">
          <ul>
            <li>About</li>
            <li>Contact us</li>
            <li>download the app</li>
          </ul>
        </div>

      </div>
    </div>
    </footer>
</body>

</html>
