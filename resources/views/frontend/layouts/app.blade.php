<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Satélite K, Segell Discogràfic i Producció</title>
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300i,400,400i,500,500i,600,600i,700&display=swap" rel="stylesheet">
    
    @yield('styles')

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/bootstrap4/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/owl-carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/slick/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/lightGallery-master/dist/css/lightgallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fonts/Linearicons/Linearicons/Font/demo-files/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/home-default.css') }}">
</head>
<body>
<header class="header header--standard {{ (request()->is('/')) ? 'transparent' : '' }}" data-sticky="true">
    <div class="header__left"><a class="ps-logo" href="{{ route('frontend.inici.index') }}"><img src="{{ asset('frontend/img/logo.png') }}" alt="Satélite K"></a></div>
    <div class="header__right">
        <div class="header__navigation">
            <ul class="menu">
                <li><a href="#">Qui Som</a></li>
                <li><a href="{{ route('frontend.artistes.index') }}" class="{{ (request()->is('artistes*')) ? 'active' : '' }}">Artistes</a></li>
                <li><a href="#">Catàleg</a></li>
                <li><a href="#">Vídeos</a></li>
                <li><a href="#">Serveis</a></li>
                <li><a href="#">Contacte</a></li>
            </ul>
        </div>
        <div class="header__container">
            <div class="header__search">
                <form class="ps-form--header-search" action="#" method="get">
                    <input class="form-control" type="text" placeholder="Cercador...">
                    <button><i class="icon-magnifier"></i></button>
                </form>
                <a class="header__search-mini" href="#"><i class="icon-magnifier"></i></a>
            </div>
            <div class="header__actions">
                <div class="ps-banner__social">
                    <ul class="ps-list--social">
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    </ul>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;CAT / ESP
            </div>
        </div>
    </div>
</header>
<header class="header header--mobile" data-sticky="true">
    <div class="header__left"><a class="ps-logo" href="{{ route('frontend.inici.index') }}"><img src="{{ asset('frontend/img/logo.png') }}" alt="Satélite K"></a></div>
    <div class="header__right">
        <div class="header__container"><a class="header__search-mini" href="#"><i class="icon-magnifier"></i></a></div>
        <div class="header__actions"><a class="header__menu-toggle ps-toggle--sidebar" href="#navigation-mobile"><i class="icon-menu"></i></a></div>
    </div>
</header>
<div id="{{ (request()->is('/')) ? 'homepage-default' : '' }}" class="{{ (request()->is('/')) ? '' : 'ps-shop' }}">

    @yield('content')

    <footer class="ps-footer--2 ps-footer--fullwidth">
        <div class="container">
            <div class="ps-footer__content">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-4 col-sm-6 col-6 ">
                        <aside class="widget widget_footer widget_align-right">
                            <img src="{{ asset('frontend/img/logo.png') }}" alt="Satélite K">
                            <p class="mt-20">Satélite K és una companyia discogràfica nascuda a Barcelona, especialitzada en la producció, promoció i desenvolupament musical de talents i propostes d'interès i risc cultural.</p>
                        </aside>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 ">
                        <aside class="widget widget_footer widget_align-right">
                            <h3 class="widget-title">Satélite K</h3>
                            <ul class="ps-list--line">
                                <li><a href="{{ route('frontend.artistes.index') }}">Artistes</a></li>
                                <li><a href="#">Catàleg</a></li>
                                <li><a href="#">Vídeos</a></li>
                                <li><a href="#">Serveis</a></li>
                                <li><a href="#">Contacte</a></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 ">
                        <aside class="widget widget_footer widget_align-right">
                            <h3 class="widget-title">Idioma</h3>
                            <ul class="ps-list--line">
                                <li><a href="#">Español</a></li>
                                <li><a href="#">Català</a></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 ">
                        <aside class="widget widget_footer widget_align-right">
                            <h3 class="widget-title">Contacte</h3>
                            <p><i class="fa fa-location-arrow"></i> C/ Pallars,65, 2 4</p>
                            <p>08018 Barcelona</p>
                            <p>Espanya</p>
                            <p><i class="fa fa-phone"></i> +34 93 320 86 08</p>
                            <p><i class="fa fa-envelope"></i> info@satelitek.com</p>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-footer__bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 ">
                        <p class="ps-footer__copyright"><a target="_blank" href="https://www.webmastervic.com/"></a>Disseny web Webmastervic</p>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 ">
                        <div class="ps-list--social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-spotify"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                        <p class="ps-footer__links">
                        <a class="ps-link--line" href="#">Política de privacitat</a>
                        <a class="ps-link--line" href="#">Avís legal</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<div id="back2top"><i class="pe-7s-angle-up"></i></div>
<div class="ps-site-overlay"></div>
<div id="loader-wrapper">
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
    <div class="ps-search__content">
        <form class="ps-form--primary-search" action="do_action" method="post">
            <input class="form-control" type="text" placeholder="Search for...">
            <button><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>
    <!-- Plugins-->
    <script src="{{ asset('frontend/plugins/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/bootstrap4/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/imagesloaded.pkgd.js') }}"></script>
    <script src="{{ asset('frontend/plugins/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/jquery.matchHeight-min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/slick/slick/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/lightGallery-master/dist/js/lightgallery-all.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/sticky-sidebar/dist/sticky-sidebar.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    @yield('scripts')

</body>
</html>