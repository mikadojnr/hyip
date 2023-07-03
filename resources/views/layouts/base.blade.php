<!doctype html>
<html lang="en">


<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">


    <!-- Vendor/Plugins CSS -->
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('vendor/animate-css/animate.min.css') }}">
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('vendor/slick/slick.css') }}">
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('vendor/slick/slick-theme.css') }}">
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('vendor/magnific-popup/magnific-popup.css') }}">
    <link type="text/css" rel="stylesheet" media="all" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7COpen+Sans:400,600,700&display=swap">
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('vendor/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('fonts/flaticon/flaticon.css') }}">

    <!-- Bootbox Template CSS -->
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('css/main.css') }}">

    {{-- font-awesome-4.7.0 --}}
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">



    <title>Edgepool</title>

<link rel="apple-touch-icon" sizes="57x57" href="apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
{{-- <link rel="manifest" href="manifest.json"> --}}
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

</head>

<body id="page-top">

    <!-- START Loader -->
    <div id="preloader">
        <div class="blobs">
            <div class="blob-center"></div>
            <div class="blob"></div>
            <div class="blob"></div>
            <div class="blob"></div>
            <div class="blob"></div>
            <div class="blob"></div>
            <div class="blob"></div>
        </div>
    </div>
    <!-- END Loader -->

    <!-- START Header -->
    <header class="header position-relative">
        <!-- START Navigation -->
        <div class="navigation-bar" id="affix">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light navbar-reset">
                    <a class="logo" href="{{route('home')}}">
                        {{-- <img class="logo-default" src="{{ asset('img/logo-light.png') }}" alt="Bootbox"> --}}
                        <h1 style="color:white; z-index: "><b>EDGEPOOL</b></h1>
                    </a>
                    <button class="navbar-toggler border-0 p-0" type="button" data-toggle="collapse" data-target="#theme-navbar" aria-controls="theme-navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-lines"></span>

                    </button>
                    <div class="collapse navbar-collapse" id="theme-navbar">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home')}}">Home</a>
                            </li>

							<li class="nav-item">
                                <a class="nav-link" href="{{route('about')}}">About</a>
                            </li>



                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{route('faqs')}}">FAQs</a>
                            </li>


                            {{-- <li class="nav-item">
                                <a class="nav-link" href="/terms">Terms</a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact')}}">Contact Us</a>
                            </li>

                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register')}}">Signup</a>
                                </li>

                                <li class="my-3 my-lg-0">
                                    <a href="{{ route('login')}}" class="btn btn-custom">Login</a>
                                </li>
                            @else
                                {{-- Check if user is admin --}}
                                @if(Auth::user()->utype === 'ADM')
                                    <li class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-user fa-1x"></i>
                                            My Account ({{Str::title(Auth::user()->name)}})
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a href="{{ route('admin.dashboard')}}" class="dropdown-item">Dashboard</a>

                                            <a href="{{route('admin.view-admins')}}" class="dropdown-item">Admins</a>
                                            <a href="{{route('admin.view-users')}}" class="dropdown-item">Users</a>
                                            <a href="{{ route('admin.investment-plans')}}" class="dropdown-item">Staking Plans</a>
                                            <a href="{{ route('admin.transactions')}}" class="dropdown-item">All Transactions</a>

                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <a href="{{route('logout')}}" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit(); ">Logout</a>
                                            </form>


                                        </div>
                                    </li>
                                {{-- If user is not admin --}}
                                @else
                                    <li class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-user fa-1x"></i>
                                            My Account ({{Str::title(Auth::user()->name)}})
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a href="{{ route('user.dashboard')}}" class="dropdown-item">Dashboard</a>
                                            <a href="{{ route('user.profile',['user_id'=>Auth::user()->id])}}" class="dropdown-item">My Profile</a>
                                            <a href="{{ route('user.investment-plans')}}" class="dropdown-item">Staking Plans</a>
                                            <a href="{{ route('user.referrals')}}" class="dropdown-item">Referrals</a>
                                            <a href="{{ route('user.transactions')}}" class="dropdown-item">Transactions</a>

                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <a href="{{route('logout')}}" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit(); ">Logout</a>
                                            </form>


                                        </div>
                                @endif
                            @endguest
                        </ul>

                    </div>
                </nav>
            </div>
        </div>
        <!-- END Navigation -->
    </header>
    <!-- END Header -->

{{$slot}}

    <!-- START Footer -->
    <footer class="sp-100-70 bg-gradi counters-section" id="counters">
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-md-6 col-xl-3 mb-30">
                        <div class="mb-30">
                            {{-- <img class="logo-footer" src="{{ asset('img/logo-light.png') }}" alt="Bootbox"> --}}
                        <h3 class="logo-default" style="color:white"><b>EDGEPOOL</b></h3>

                        </div>
                        <p class="mb-30 c-white">We are a leading global staking solutions partner, dedicated to improving peoples financial security.</p>
                        {{-- <div class="socials">
                            <a href="#" class="zmdi zmdi-facebook"></a>
                            <a href="#" class="zmdi zmdi-twitter"></a>
                            <a href="#" class="zmdi zmdi-google"></a>
                            <a href="#" class="zmdi zmdi-instagram"></a>
                        </div> --}}
                    </div>
                    <div class="col-md-6 col-xl-3 mb-30">
                        <h4 class="btm-sep pb-3 mb-30 c-white font-weight-semi-bolder">Our company</h4>
                        <div class="foot-links">
                            <a href="/">Home</a>
                            <a href="{{route('about')}}">About Us</a>

                            <a href="{{route('faqs')}}">FAQ</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-30">
                        <h4 class="btm-sep pb-3 mb-30 c-white font-weight-semi-bolder">User</h4>
                        <div class="foot-links">

                            <a href="{{ route('contact')}}">Contact Us</a>
                            @guest
                                <a href="{{ route('login')}}">Log In</a>
                                <a href="{{route('register')}}">Sign Up</a>
                            @else
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <a href="{{route('logout')}}" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit(); ">Logout</a>
                            </form>
                            @endguest

                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-30">
                        <h4 class="btm-sep pb-3 mb-30 c-white font-weight-semi-bolder">Contact us</h4>
                        <ul class="contact-info mt-4">
                            <li>
                                <div><strong>Head Office</strong></div>
                                <i class="zmdi zmdi-pin"></i>
                                1020,Mate Jozsef ,Marianna Siklos Hungary
                            </li>
                            <li>
                                <div><strong>Branch Office</strong></div>
                                <i class="zmdi zmdi-pin"></i>
                                234 Pine Street, Toronto, Canada.
                            </li>
                            <li>
                                <i class="zmdi zmdi-whatsapp"></i>
                                <a href="https://wa.me/+33701651402" target="_blank" style="text-decoration: none; color:white">+337-0165-1402</a>

                            </li>

                            <li>
                                <i class="zmdi zmdi-email"></i>
                                <a href="mailto:edgepool01@gmail.com" class="text-decoration-none text-white">info@edgepool.online</a>
                            </li>
                            <li>
                                <i class="zmdi zmdi-phone"></i>
                                <a href="tel:+1 251 318 8879" class="text-white">+1 (251) 318 8879</a>
                                <br>
                                <a href="tel:+1 450 804 4962" class="text-white">+1 (450) 804 4962</a>


                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="copyright text-center c-white">
                Edgepool <span class="d-none d-md-inline-block">{{date('Y')}}</span>
            </div>
        </div>
    </footer>
    <!-- END Footer -->

    <!-- START Scroll-To-Top -->
    <a id="back-top" class="back-top" href="javascript:void(0)">
        <span class="zmdi zmdi-triangle-up mb-1"></span>
    </a>
    <!-- END Scroll-To-Top -->

    <!-- Global Required JS -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Vendor/Plugins JS -->
    <script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('vendor/wowjs/wow.min.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>

    <!--Start of Tawk.to Script-->
{{-- <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ddd0a9dd96992700fc949c5/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script> --}}
<!--End of Tawk.to Script-->

@livewireScripts
</body>
