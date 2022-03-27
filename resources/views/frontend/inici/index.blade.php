@extends('frontend.layouts.app')

@section('content')
    <div class="ps-home-banner">
        <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7500"
            data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1"
            data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1200"
            data-owl-mousedrag="on">
            <div class="ps-banner--3 bg--top-right" data-background='{{ asset("/storage/$slider1->foto") }}'>
                <div class="ps-banner__content">
                    <p data-animation-in="fadeInLeft" data-animation-out="animate-out fadeOutRight">{{$slider1->nom_artista}}</p>
                    <h3 data-animation-in="fadeInLeft" data-animation-out="animate-out fadeOutRight">{{$slider1->nom_disc}}</h3>
                    <a class="ps-link--under" href="#" data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutDown">{{$slider1->titol_link_cat}}</a>
                </div>
            </div>
            <div class="ps-banner--3 bg--top-left right" data-background='{{ asset("/storage/$slider2->foto") }}'>
                <div class="ps-banner__content">
                    <p data-animation-in="fadeInRight" data-animation-out="animate-out fadeOutLeft">{{$slider2->nom_artista}}</p>
                    <h3 data-animation-in="fadeInRight" data-animation-out="animate-out fadeOutLeft">{{$slider2->nom_disc}}</h3>
                    <a class="ps-link--under" href="#" data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutDown">{{$slider1->titol_link_cat}}</a>
                </div>
            </div>
            <div class="ps-banner--3 bg--top-right" data-background='{{ asset("/storage/$slider3->foto") }}'>
                <div class="ps-banner__content">
                    <p data-animation-in="fadeInLeft" data-animation-out="animate-out fadeOutRight">{{$slider3->nom_artista}}</p>
                    <h3 data-animation-in="fadeInLeft" data-animation-out="animate-out fadeOutRight">{{$slider3->nom_disc}}</h3>
                    <a class="ps-link--under" href="#" data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutDown">{{$slider1->titol_link_cat}}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-home-product--fullwidth ps-tab-root">
        <div class="ps-section__header">
            <div class="container">
                <div class="ps-section ps-home-top-web" style="padding-top: 0px">
                    <div class="ps-section__header">
                    <figure>
                        <figcaption>Catàleg</figcaption>
                        <p>Single, EP, Àlbum, Pack i llibres dels artistes de Satélite K</p>
                    </figure>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="ps-tabs">
                <div class="ps-tab active" id="tab-1">
                    <div class="row row--5-columns">
                        @foreach ($discs as $disc)
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                                <div class="ps-product">
                                    <div class="ps-product__thumbnail">
                                        <a class="ps-post__overlay" href="{{ route('frontend.discs.show', ['disc' => $disc->slug]) }}">
                                            <img class="ps-product__image" src='{{ asset("/storage/$disc->foto") }}' alt="Satélite K"/>
                                        </a>
                                        <div class="ps-product__actions"><a href="{{ route('frontend.discs.show', ['disc' => $disc->slug]) }}">Veure disc</a></div>
                                    </div>
                                    <div class="ps-product__content">
                                        <a class="ps-product__title" href="{{ route('frontend.discs.show', ['disc' => $disc->slug]) }}">{{ $disc->titol }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="ps-section__footer text-center"><a class="ps-link--under" href="#">Descobreix-ne més</a></div>
        </div>
    </div>
    <div class="ps-section ps-home-top-web">
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
                                    @foreach ($artistes as $artista)
                                        <div class="col-sm-12 col-xl-3">
                                            <div class="ps-block--portfolio">
                                                <div class="ps-block__thumbnail">
                                                    <a class="ps-block__overlay" href="{{ route('frontend.artistes.show', ['artista' => $artista->slug]) }}"></a>
                                                    <img src='{{ asset("/storage/$artista->foto") }}' alt="Satélite K">
                                                </div>
                                                <div class="ps-block__content">
                                                    <a href="{{ route('frontend.artistes.show', ['artista' => $artista->slug]) }}">{{ $artista->nom }}</a>
                                                    <p>{{ $artista->genere->nom_cat }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                                <div class="ps-section__footer text-center"><a class="ps-link--under" href="{{ route('frontend.artistes.index') }}">Descobreix-ne més</a></div>
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
                <div class="ps-section ps-home-top-web" style="padding-top: 0px">
                    <div class="ps-section__header">
                    <figure>
                        <figcaption>Segueix-nos!</figcaption>
                        <p>Les últimes novetats de Satélite K</p>
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
                    <form class="ps-form--keep-connected" action="index.html" method="POST"><i class="icon-envelope"></i>
                        @csrf
                        <input class="form-control" type="text" placeholder="Correu electrònic">
                        <button>Subscriu-te</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection