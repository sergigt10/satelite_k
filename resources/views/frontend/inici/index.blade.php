@extends('frontend.layouts.app')

@section('content')
<div class="ps-home-banner">
        <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7500"
            data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1"
            data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000"
            data-owl-mousedrag="on">
            <div class="ps-banner--3 bg--top-right" data-background="{{ asset('frontend/img/slide-1.jpg') }}">
                <div class="ps-banner__content">
                    <p data-animation-in="fadeInLeft" data-animation-out="animate-out fadeOutRight">Marina Rossell</p>
                    <h3 data-animation-in="fadeInLeft" data-animation-out="animate-out fadeOutRight">300 crits
                    </h3>
                    <a class="ps-link--under" href="#" data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutDown">Ja disponible!</a>
                </div>
            </div>
            <div class="ps-banner--3 bg--top-left right" data-background="{{ asset('frontend/img/slide-2.jpg') }}">
                <div class="ps-banner__content">
                    <p data-animation-in="fadeInRight" data-animation-out="animate-out fadeOutLeft">GREEN VALLEY</p>
                    <h3 data-animation-in="fadeInRight" data-animation-out="animate-out fadeOutLeft">Trendy <br> Pink</h3>
                    <a class="ps-link--under" href="#" data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutDown">Mira el videoclip</a>
                </div>
            </div>
            <div class="ps-banner--3 bg--top-right" data-background="{{ asset('frontend/img/slide-3.jpg') }}">
                <div class="ps-banner__content">
                    <p data-animation-in="fadeInLeft" data-animation-out="animate-out fadeOutRight">JUANITO MAKANDÉ</p>
                    <h3 data-animation-in="fadeInLeft" data-animation-out="animate-out fadeOutRight">El Tango de <br> las Ratas</h3>
                    <a class="ps-link--under" href="#" data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutDown">Ja disponible a totes les plataformes</a>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-home-product--fullwidth ps-tab-root">
        <div class="ps-section__header">
            <div class="container">
                <div class="ps-section ps-home-top-sellers" style="padding-top: 0px">
                    <div class="ps-section__header">
                    <figure>
                        <figcaption>Catàleg</figcaption>
                        <p>Àlbums, biografies i fotos dels artistes de Satélite K</p>
                    </figure>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="ps-tabs">
                <div class="ps-tab active" id="tab-1">
                    <div class="row row--5-columns">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <a class="ps-post__overlay" href="#">
                                        <img class="ps-product__image" src="{{ asset('frontend/img/1.jpg') }}" alt="Satélite K"/>
                                    </a>
                                    <div class="ps-product__actions"><a href="#"> Veure disc</a></div>
                                </div>
                                <div class="ps-product__content"><a class="ps-product__title" href="#">Carmen Valenzuela</a></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <a class="ps-post__overlay" href="#">
                                        <img class="ps-product__image" src="{{ asset('frontend/img/2.jpg') }}" alt="Satélite K"/>
                                    </a>
                                    <div class="ps-product__actions"><a href="#"> Veure disc</a></div>
                                </div>
                                <div class="ps-product__content"><a class="ps-product__title" href="#">Ágora</a></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <a class="ps-post__overlay" href="#">
                                        <img class="ps-product__image" src="{{ asset('frontend/img/3.jpg') }}" alt="Satélite K"/>
                                    </a>
                                    <div class="ps-product__actions"><a href="#"> Veure disc</a></div>
                                </div>
                                <div class="ps-product__content"><a class="ps-product__title" href="#">Dolce Vita</a></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <a class="ps-post__overlay" href="#">
                                        <img class="ps-product__image" src="{{ asset('frontend/img/4.jpg') }}" alt="Satélite K"/>
                                    </a>
                                    <div class="ps-product__actions"><a href="#"> Veure disc</a></div>
                                </div>
                                <div class="ps-product__content"><a class="ps-product__title" href="#">El Tiempo Entre Dos Es Secreto</a></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <a class="ps-post__overlay" href="#">
                                        <img class="ps-product__image" src="{{ asset('frontend/img/5.jpg') }}" alt="Satélite K"/>
                                    </a>
                                    <div class="ps-product__actions"><a href="#"> Veure disc</a></div>
                                </div>
                                <div class="ps-product__content"><a class="ps-product__title" href="#">Maken Row</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-tab" id="tab-2">
                    <div class="row row--5-columns">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <a class="ps-post__overlay" href="#">
                                        <img class="ps-product__image" src="{{ asset('frontend/img/1.jpg') }}" alt="Satélite K"/>
                                    </a>
                                    <div class="ps-product__actions"><a href="#"> Veure disc</a></div>
                                </div>
                                <div class="ps-product__content"><a class="ps-product__title" href="#">Carmen Valenzuela</a></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                <a class="ps-post__overlay" href="#">
                                    <img class="ps-product__image" src="{{ asset('frontend/img/2.jpg') }}" alt="Satélite K"/>
                                </a>
                                <div class="ps-product__actions"><a href="#">Veure disc</a></div>
                                </div>
                                <div class="ps-product__content"><a class="ps-product__title" href="#">Ágora</a></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <a class="ps-post__overlay" href="#">
                                        <img class="ps-product__image" src="{{ asset('frontend/img/3.jpg') }}" alt="Satélite K"/>
                                    </a>
                                    <div class="ps-product__actions"><a href="#">Veure disc</a></div>
                                </div>
                                <div class="ps-product__content"><a class="ps-product__title" href="#">Dolce Vita</a></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <a class="ps-post__overlay" href="#">
                                        <img class="ps-product__image" src="{{ asset('frontend/img/4.jpg') }}" alt="Satélite K"/>
                                    </a>
                                    <div class="ps-product__actions"><a href="#">Veure disc</a></div>
                                </div>
                                <div class="ps-product__content"><a class="ps-product__title" href="#">El Tiempo Entre Dos Es Secreto</a></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <a class="ps-post__overlay" href="#">
                                        <img class="ps-product__image" src="{{ asset('frontend/img/5.jpg') }}" alt="Satélite K"/>
                                    </a>
                                    <div class="ps-product__actions"><a href="#">Veure disc</a></div>
                                </div>
                                <div class="ps-product__content"><a class="ps-product__title" href="#">Maken Row</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-tab" id="tab-3">
                    <div class="row row--5-columns">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <a class="ps-post__overlay" href="#">
                                        <img class="ps-product__image" src="{{ asset('frontend/img/1.jpg') }}" alt="Satélite K"/>
                                    </a>
                                    <div class="ps-product__actions"><a href="#">Veure disc</a></div>
                                </div>
                                <div class="ps-product__content">
                                    <a class="ps-product__title" href="#">Carmen Valenzuela</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <a class="ps-post__overlay" href="#">
                                        <img class="ps-product__image" src="{{ asset('frontend/img/2.jpg') }}" alt="Satélite K"/>
                                    </a>
                                    <div class="ps-product__actions"><a href="#">Veure disc</a></div>
                                </div>
                                <div class="ps-product__content"><a class="ps-product__title" href="#">Ágora</a></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <a class="ps-post__overlay" href="#">
                                        <img class="ps-product__image" src="{{ asset('frontend/img/3.jpg') }}" alt="Satélite K"/>
                                    </a>
                                    <div class="ps-product__actions"><a href="#">Veure disc</a></div>
                                </div>
                                <div class="ps-product__content"><a class="ps-product__title" href="#">Dolce Vita</div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <a class="ps-post__overlay" href="#">
                                    <img class="ps-product__image" src="{{ asset('frontend/img/4.jpg') }}" alt="Satélite K"/>
                                </a>
                                <div class="ps-product__actions"><a href="#">Veure disc</a></div>
                            </div>
                            <div class="ps-product__content"><a class="ps-product__title" href="#">El Tiempo Entre Dos Es Secreto</a></div>
                        </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <a class="ps-post__overlay" href="#">
                                        <img class="ps-product__image" src="{{ asset('frontend/img/5.jpg') }}" alt="Satélite K"/>
                                    </a>
                                    <div class="ps-product__actions"><a href="#">Veure disc</a></div>
                                </div>
                                <div class="ps-product__content"><a class="ps-product__title" href="#">Maken Row</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-section__footer text-center"><a class="ps-link--under" href="#">Descobreix-ne més</a></div>
        </div>
    </div>
    <div class="ps-section ps-home-top-sellers">
        <div class="container">
            <div class="ps-section__header">
                <figure>
                    <figcaption>Artistes</figcaption>
                    <p>Àlbums, biografies i fotos dels artistes de Satélite K</p>
                </figure>
            </div>
            <div class="ps-page">
                <div class="ps-page ps-page--default">
                    <div class="container">
                        <div class="ps-page__content">
                            <div class="ps-portfolio-box">
                                <div class="ps-section__content">
                                    <div class="row">
                                        <div class="col-sm-12 col-xl-3">
                                            <div class="ps-block--portfolio">
                                                <div class="ps-block__thumbnail"><a class="ps-block__overlay" href="#"></a><img src="{{ asset('frontend/img/1-2.jpg') }}" alt="Satélite K"></div>
                                                <div class="ps-block__content"><a href="#">Maruja Límon</a>
                                                    <p>Ritmes llatins</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-xl-3">
                                            <div class="ps-block--portfolio">
                                                <div class="ps-block__thumbnail"><a class="ps-block__overlay" href="#"></a><img src="{{ asset('frontend/img/1-1.jpg') }}" alt="Satélite K"></div>
                                                <div class="ps-block__content"><a href="#">Xicu</a>
                                                    <p>Musica urbana</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-xl-3">
                                            <div class="ps-block--portfolio">
                                                <div class="ps-block__thumbnail"><a class="ps-block__overlay" href="#"></a><img src="{{ asset('frontend/img/1-3.jpg') }}" alt="Satélite K"></div>
                                                <div class="ps-block__content"><a href="#">Maken Row</a>
                                                    <p>Hip-Hop</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-xl-3">
                                            <div class="ps-block--portfolio">
                                                <div class="ps-block__thumbnail"><a class="ps-block__overlay" href="#"></a><img src="{{ asset('frontend/img/1-4.jpg') }}" alt="Satélite K"></div>
                                                <div class="ps-block__content"><a href="#">Dem</a>
                                                    <p>Regae</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__footer text-center"><a class="ps-link--under" href="#">Descobreix-ne més</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    <div class="ps-section--instagram">
        <div class="ps-section__header">
            <div class="container">
                <div class="ps-section ps-home-top-sellers" style="padding-top: 0px">
                    <div class="ps-section__header">
                    <figure>
                        <figcaption>Segueix-nos!</figcaption>
                    </figure>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="0"
                data-owl-nav="false" data-owl-dots="false" data-owl-item="7" data-owl-item-xs="3" data-owl-item-sm="4"
                data-owl-item-md="5" data-owl-item-lg="6" data-owl-duration="1000" data-owl-mousedrag="off">
            <div class="ps-block--instagram">
                <img src="{{ asset('frontend/img/instagram/1.jpg') }}" alt="Satélite K"><a href="#"><i class="fa fa-instagram"></i></a>
            </div>
            <div class="ps-block--instagram">
                <img src="{{ asset('frontend/img/instagram/2.jpg') }}" alt="Satélite K"><a href="#"><i class="fa fa-instagram"></i></a>
            </div>
            <div class="ps-block--instagram">
                <img src="{{ asset('frontend/img/instagram/3.jpg') }}" alt="Satélite K"><a href="#"><i class="fa fa-instagram"></i></a>
            </div>
            <div class="ps-block--instagram">
                <img src="{{ asset('frontend/img/instagram/4.jpg') }}" alt="Satélite K"><a href="#"><i class="fa fa-instagram"></i></a>
            </div>
            <div class="ps-block--instagram">
                <img src="{{ asset('frontend/img/instagram/5.jpg') }}" alt="Satélite K"><a href="#"><i class="fa fa-instagram"></i></a>
            </div>
            <div class="ps-block--instagram">
                <img src="{{ asset('frontend/img/instagram/6.jpg') }}" alt="Satélite K"><a href="#"><i class="fa fa-instagram"></i></a>
            </div>
            <div class="ps-block--instagram">
                <img src="{{ asset('frontend/img/instagram/7.jpg') }}" alt="Satélite K"><a href="#"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </div>
    <div class="ps-home-subscribe">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-12 ">
                    <figure>
                        <figcaption>Newsletter</figcaption>
                        <p>Rebeu actualitzacions al nostre butlletí</p>
                    </figure>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 col-12 ">
                    <form class="ps-form--keep-connected" action="index.html" method="get"><i class="icon-envelope"></i>
                        <input class="form-control" type="text" placeholder="Correu electrònic">
                        <button>Subscriu-te</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection