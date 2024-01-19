<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <link rel="icon" href="../../img/LO6.png" type="image/x-icon">
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templatemo-festava-live.css') }}">

</head>

    <body>
    <main>

<header class="site-header">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 d-flex flex-wrap">
                <p class="d-flex me-4 mb-0">

                    <strong class="text-dark">CARNETAPP</strong>
                </p>
            </div>

        </div>
    </div>
</header>


<nav class="navbar navbar-expand-lg" style="background-color: rgba(128, 128, 128, 0.5);">
    <div class="container">


        <a href="/" class="text-dark"><img class="logo_icono"src="../../img/LO6.png" alt="Image 2"><strong>HOME</strong></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">

            @if(session('user'))
                <li class="nav-item">
                    <a class="nav-link click-scroll text-dark" href="{{route('dashboard')}}"><i class="bi-person custom-icon me-2"></i>DASHBOAR</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll text-dark" href="{{route('salir')}}">EXIT</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link click-scroll text-dark" href="{{route('login')}}">LOGIN</a>
                </li>

               <!-- <li class="nav-item">
                    <a class="nav-link click-scroll text-dark" href="{{route('register')}}">REGISTER</a>
                </li>-->
                @endif

        </div>
    </div>
</nav>
<style>
    .scrollable-div {
  max-height: 700px; /* Establece la altura máxima deseada */
  overflow-y: auto; /* Habilita la barra de desplazamiento vertical */
}
.scrollable-div2{
     max-height: 80%; /* Establece la altura máxima deseada */
  overflow-y: auto;
}
.w-5{
    display:none;
}
.img-st-icon
{
    width:100px;height:100px;
}
.icontpx{
        width:30px;height:30px;
}

.WhiteCol{
 color:white;
}
</style>

            <div class="container ">
            @yield('content')
        </div>

<br><br><br>

    

        <div class="container">

                        <p class="copyright-text">Copyright © Polk Vernaza</p>

           </div>



    </footer>


    <!-- JAVASCRIPT FILES  
elpelote_rpgaduser    TRGGBSHSTSD2023-->
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/jquery.sticky.js')}}"></script>
    <script src="{{ asset('js/click-scroll.js')}}"></script>
    <script src="{{ asset('js/custom.js')}}"></script>
    <script src="{{ asset('js/typed.js')}}"></script>
    <script src="{{ asset('js/index.js')}}"></script>
            <script>
          
       

            </script>

            
    </body>
</html>
