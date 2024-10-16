<!DOCTYPE html>
<html lang="{{ Config::get('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <meta name="facebook-domain-verification" content="3eok39df7bovf1zvinhpolyo877s6c" />

    <!-- SEO -->
    {!! SEO::generate() !!}

    <meta name="author" content="Satélite K">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300i,400,400i,500,500i,600,600i,700&display=swap" rel="stylesheet">
    
    <!-- estils personalitzats -->
    @yield('styles')

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/bootstrap4/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/owl-carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/slick/slick/slick.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('frontend/plugins/lightGallery-master/dist/css/lightgallery.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugins/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fonts/Linearicons/Linearicons/Font/demo-files/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/home-default.css') }}">

    <link rel="shortcut icon" href="{{ asset('frontend/img/favicon.ico') }}" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KG5FKKJ042"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-KG5FKKJ042');
    </script>
    <!-- Google tag (gtag.js) -->

    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '547708011319583');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=547708011319583&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Meta Pixel Code -->
</head>
<body>
<header class="header header--standard {{ (request()->is('/')) ? 'transparent' : '' }}" data-sticky="true">
    <div class="header__left"><a class="ps-logo" href="{{ route('frontend.inici.index') }}"><img src="{{ asset('frontend/img/logo.png') }}" alt="Satélite K"></a></div>
    <div class="header__right">
        <div class="header__navigation">
            <ul class="menu">
                <li><a href="{{ route('frontend.inici.index') }}" class="{{ (request()->is('/')) ? 'active' : '' }}">@lang('Inici')</a></li>
                <li><a href="{{ route('frontend.about.index') }}" class="{{ (request()->is('quienes-somos-satelitek')) ? 'active' : '' }}">@lang('Qui som')</a></li>
                <li><a href="{{ route('frontend.artistes.index') }}" class="{{ (request()->is('artistas*')) || (request()->is('orden')) ? 'active' : '' }}">@lang('Artistes')</a></li>
                <li class="menu-item-has-children">
                    <a href="{{ route('frontend.discs.index') }}" class="{{ (request()->is('discos*') || request()->is('libros*')) ? 'active' : '' }}">@lang('Catàleg')</a><span class="sub-toggle"></span>
                    <ul class="sub-menu">
                        <li><a href="{{ route('frontend.discs.index') }}">@lang('Discos')</a></li>
                        <li><a href="{{ route('frontend.llibres.index') }}">@lang('Llibres')</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('frontend.videos.index') }}" class="{{ (request()->is('videos')) ? 'active' : '' }}">@lang('Vídeos')</a></li>
                <li><a href="{{ route('frontend.noticies.index') }}" class="{{ (request()->is('noticias*')) ? 'active' : '' }}">@lang('Blog')</a></li>
                <li class="menu-item-has-children">
                    <a href="#">@lang('Serveis')</a><span class="sub-toggle"></span>
                    <ul class="sub-menu">
                        <li><a href="#" target="_blank">@lang('Distribució física')</a></li>
                        <li><a href="https://autoeditarte.com/" target="_blank">@lang('Distribució i màrqueting digital')</a></li>
                        <li><a href="https://autoeditarte.com/" target="_blank">@lang('Autoedició')</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('frontend.contact.index') }}" class="{{ (request()->is('contacto-satelitek')) ? 'active' : '' }}">@lang('Contacte')</a></li>
            </ul>
        </div>
        <div class="header__container">
            <div class="header__search">
                <form class="ps-form--header-search" action="{{ route('frontend.search.index') }}" method="POST">
                    @csrf
                    <input class="form-control" type="text" placeholder="@lang('Cercador...')" name="cercar" required>
                    <button><i class="icon-magnifier"></i></button>
                </form>
            </div>
            <div class="header__actions">
                <div class="ps-banner__social">
                    <ul class="ps-list--social">
                        <li><a href="https://www.instagram.com/satelitek.label/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="https://www.youtube.com/user/SateliteKVideos" target="_blank"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;<a class="idiomes-link {{ ( app()->getLocale() === 'ca' ) ? 'bold-idioma' : '' }}" href="{{ Request::root() }}/lang/ca">CAT</a>&nbsp;<a class="idiomes-link {{ ( app()->getLocale() === 'es' ) ? 'bold-idioma' : '' }}" href="{{ Request::root() }}/lang/es">ESP</a>
            </div>
        </div>
    </div>
</header>
<header class="header header--mobile" data-sticky="true">
    <div class="header__left"><a class="ps-logo" href="{{ route('frontend.inici.index') }}"><img src="{{ asset('frontend/img/logo.png') }}" alt="Satélite K"></a></div>
    <div class="header__right">
        <!-- <div class="header__container"><a class="header__search-mini" href="#"><i class="icon-magnifier"></i></a></div> -->
        <div class="header__actions"><a class="header__menu-toggle ps-toggle--sidebar" href="#navigation-mobile"><i class="icon-menu"></i></a></div>
    </div>
</header>
<div id="{{ (request()->is('/')) ? 'homepage-default' : '' }}" class="{{ (request()->is('/')) ? '' : 'ps-web' }}">

    @yield('content')
    
    {!! EuCookieConsent::getPopup() !!}
    
    <footer class="ps-footer--2 ps-footer--fullwidth">
        <div class="container">
            <div class="ps-footer__content">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-4 col-sm-12">
                        <aside class="widget widget_footer widget_align-right">
                            <img src="{{ asset('frontend/img/logo.png') }}" alt="Satélite K">
                            <p class="mt-20">@lang("Satélite K és una companyia discogràfica nascuda a Barcelona, especialitzada en la producció, promoció i desenvolupament de propostes artístiques eclèctiques i d'alt valor musical.")</p>
                        </aside>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 ">
                        <aside class="widget widget_footer widget_align-right">
                            <h3 class="widget-title">Satélite K</h3>
                            <ul class="ps-list--line">
                                <li><a href="{{ route('frontend.about.index') }}">@lang('Qui som')</a></li>
                                <li><a href="{{ route('frontend.artistes.index') }}">@lang('Artistes')</a></li>
                                <li><a href="{{ route('frontend.discs.index') }}">@lang('Catàleg')</a></li>
                                <li><a href="{{ route('frontend.videos.index') }}">@lang('Vídeos')</a></li>
                                <li><a href="{{ route('frontend.noticies.index') }}">@lang('Blog')</a></li>
                                <li><a href="{{ route('frontend.contact.index') }}">@lang('Contacte')</a></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 ">
                        <aside class="widget widget_footer widget_align-right">
                            <h3 class="widget-title">@lang('Idioma')</h3>
                            <ul class="ps-list--line">
                                <li><a href="{{ Request::root() }}/lang/ca">Català</a></li>
                                <li><a href="{{ Request::root() }}/lang/es">Español</a></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12">
                        <aside class="widget widget_footer widget_align-right">
                            <h3 class="widget-title">@lang('Contacte')</h3>
                            <p><i class="fa fa-location-arrow"></i> C/ Pallars,65, 5º 4ª</p>
                            <p>08018 Barcelona</p>
                            <p>@lang('Espanya')</p>
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
                        <p class="ps-footer__copyright">
                            <a target="_blank" href="https://www.webmastervic.com/" style="font-size: 14px;">Disseny web Webmastervic</a> - Satélite K © {{ now()->year }} 
                        </p>
                    </div>
                    <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6 col-12 ">
                        <div class="ps-list--social">
                            <li><a href="https://www.facebook.com/satelitek.label" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.instagram.com/satelitek.label/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="https://www.tiktok.com/@satelitek.label" target="_blank" style="position:relative;top:-3px;"><img style="position:relative;top:6px;" src="{{ asset('frontend/img/tik-tok-footer.png') }}" alt="Satélite K"></a></li>
                            <li><a href="https://open.spotify.com/user/3134lwlhwzz6gc7swfngxloal32y?si=dd13e0010f5a45ae" target="_blank"><i class="fa fa-spotify"></i></a></li>
                            <li><a href="https://www.threads.net/@satelitek.label" target="_blank" style="position:relative;top:-3px;"><img style="position:relative;top:6px" src="{{ asset('frontend/img/threads-footer.png') }}" alt="Satélite K"></a></a></li>
                            <li><a href="https://www.youtube.com/user/SateliteKVideos" target="_blank"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="https://twitter.com/satelitek" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-12 col-sm-12 col-12 ">
                        <p class="ps-footer__links">
                            <a class="ps-link--line" href="{{ route('frontend.inici.avisLegal') }}">@lang('Avís legal')</a>
                            <a class="ps-link--line" href="{{ route('frontend.inici.politica') }}">@lang('Política privadesa')</a>
                            <a class="ps-link--line" href="{{ route('frontend.inici.politicaCookies') }}">@lang('Política cookies')</a>
                            <a class="ps-link--line" href="{{ route('frontend.inici.politicaRedes') }}">@lang('Xarxes socials')</a>
                        </p>
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
<div class="ps-panel--sidebar" id="navigation-mobile">
    <div class="ps-panel__header"><a class="ps-panel__close" href="#"><i class="icon-cross"></i></a></div>
    <div class="ps-panel__content">
        <nav class="ps-navigation--mobile">
            <div class="ps-navigation__menu">
                <ul class="menu--mobile">
                    <li><a href="{{ route('frontend.inici.index') }}">@lang('Inici')</a></li>
                    <li><a href="{{ route('frontend.about.index') }}">@lang('Qui som')</a></li>
                    <li><a href="{{ route('frontend.artistes.index') }}">@lang('Artistes')</a></li>
                    <li class="menu-item-has-children">
                        <a href="{{ route('frontend.discs.index') }}">@lang('Catàleg')</a><span class="sub-toggle"></span>
                        <ul class="sub-menu">
                            <li><a href="{{ route('frontend.discs.index') }}">@lang('Discos')</a></li>
                            <li><a href="{{ route('frontend.llibres.index') }}">@lang('Llibres')</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('frontend.videos.index') }}">@lang('Vídeos')</a></li>
                    <li><a href="{{ route('frontend.noticies.index') }}">@lang('Blog')</a></li>
                    <li class="menu-item-has-children">
                        <a href="#">@lang('Serveis')</a><span class="sub-toggle"></span>
                        <ul class="sub-menu">
                            <li><a href="#" target="_blank">@lang('Distribució física')</a></li>
                            <li><a href="https://kzoomusic.com/" target="_blank">@lang('Distribució i màrqueting digital')</a></li>
                            <li><a href="https://autoeditarte.com/" target="_blank">@lang('Autoedició')</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('frontend.contact.index') }}">@lang('Contacte')</a></li>
                </ul>
            </div>
            <a class="idiomes-link {{ ( app()->getLocale() === 'ca' ) ? 'bold-idioma' : '' }}" href="{{ Request::root() }}/lang/ca">CAT</a>&nbsp;<a class="idiomes-link {{ ( app()->getLocale() === 'es' ) ? 'bold-idioma' : '' }}" href="{{ Request::root() }}/lang/es">ESP</a>
            <br><br>
            <figure class="ps-navigation__bottom">
                <figcaption>Satélite K</figcaption>
                <p>C/ Pallars,65, 5º 4ª - 08018 Barcelona <br> +34 93 320 86 08 - info@satelitek.com</p>
            </figure>
            <div class="ps-banner__social">
                <ul class="ps-list--social">
                    <li><a href="https://www.instagram.com/satelitek.label/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="https://www.youtube.com/user/SateliteKVideos" target="_blank"><i class="fa fa-youtube"></i></a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<!-- Plugins-->
<script src="{{ asset('frontend/plugins/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/bootstrap4/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/imagesloaded.pkgd.js') }}"></script>
<!-- <script src="{{ asset('frontend/plugins/masonry.pkgd.min.js') }}"></script> -->
<!-- <script src="{{ asset('frontend/plugins/jquery.matchHeight-min.js') }}"></script> -->
<script src="{{ asset('frontend/plugins/slick/slick/slick.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/lightGallery-master/dist/js/lightgallery-all.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/sticky-sidebar/dist/sticky-sidebar.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>

<!-- Metricool -->
<script>function loadScript(a){var b=document.getElementsByTagName("head")[0],c=document.createElement("script");c.type="text/javascript",c.src="https://tracker.metricool.com/resources/be.js",c.onreadystatechange=a,c.onload=a,b.appendChild(c)}loadScript(function(){beTracker.t({hash:"672cad646a239a28e99d8335c104ab50"})});</script>
<!-- Pixel de seguiment -->
<img src="https://tracker.metricool.com/c3po.jpg?hash=672cad646a239a28e99d8335c104ab50"/>

@yield('scripts')

</body>
</html>