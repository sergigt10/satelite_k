@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="ps-product--detail">
            <div class="ps-product__header">
                <div class="ps-product__thumbnail" data-vertical="false">
                    <figure>
                        <div class="ps-wrapper">
                            <div class="ps-product__gallery" data-arrow="true">
                                <div aria-live="polite" class="slick-list draggable">
                                    <div class="slick-track" style="opacity: 1; width: 1665px;" role="listbox">
                                        <div class="item slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 555px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;" tabindex="-1" role="option" aria-describedby="slick-slide00">
                                            <img src='{{ asset("/storage/$artista->foto") }}' alt="Satélite K">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </figure>
                </div>
                <div class="ps-product__info">
                    <div class="ps-product__info-header" style="border-bottom: 1px solid #eaeaea;">
                        <h2 class="ps-product__title">{{ $artista->nom }}</h2>
                        <h4 class="ps-product__price"><span style="color: #999999; font-size: 17px;">Gènere:</span> {{ $artista->genere->nom_cat }}</h4>
                    </div>
                    @if ($artista->link_web)
                        <div class="ps-list--social mt-30">
                            <a href="{{ $artista->link_web }}" target="_blank">Pàgina web: <i style="font-size: 20px;" class="fa fa-globe"></i></a>
                        </div>
                    @endif
                    <div class="ps-product__desc mt-30">
                        {!! $artista->biografia_cat !!}
                    </div>
                </div>
            </div>
            <div class="ps-product__content ps-tab-root">
                <div class="container">
                    <ul class="ps-tab-list">
                        <li class="active"><a href="#tab-1">Edicions</a></li>
                        <li class=""><a href="#tab-2">Llibres</a></li>
                        <li class=""><a href="#tab-3">Notícies</a></li>
                    </ul>
                    <div class="ps-tabs">
                        <div class="ps-tab active" id="tab-1">
                            <div class="row">
                                @foreach ($artista->discs as $discsArtista)
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="ps-product">
                                            <div class="ps-product__thumbnail">
                                                <a class="ps-post__overlay" href="#">
                                                    <img class="ps-product__image" src='{{ asset("/storage/$discsArtista->foto") }}' alt="Satélite K"/>
                                                </a>
                                                <div class="ps-product__actions"><a href="#">Veure disc</a></div>
                                            </div>
                                            <div>
                                                <a href="#">{{ $discsArtista->titol }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="ps-tab" id="tab-2">
                            <div class="row">
                                <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                    <div class="ps-document">
                                        <h4>Introduction</h4>
                                        <p>With ultralight, quality cotton canvas, the JanSport Houston backpack is ideal for a life-on-the-go. This backpack features premium faux leather bottom and trim details, padded 15 in laptop sleeve and tricot lined tablet sleeve</p>
                                        <h4>Features</h4>
                                        <ul>
                                        <li>Fully padded back panel, web hauded handle</li>
                                        <li>Internal padded sleeve fits 15″ laptop &amp; unique fabric application</li>
                                        <li>Internal tricot lined tablet sleeve</li>
                                        <li>One large main compartment and zippered</li>
                                        <li>Premium cotton canvas fabric</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ps-tab" id="tab-3">
                            <div class="row">
                                <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                    <div class="ps-document">
                                        <h4>Introduction</h4>
                                        <p>With ultralight, quality cotton canvas, the JanSport Houston backpack is ideal for a life-on-the-go. This backpack features premium faux leather bottom and trim details, padded 15 in laptop sleeve and tricot lined tablet sleeve</p>
                                        <h4>Features</h4>
                                        <ul>
                                        <li>Fully padded back panel, web hauded handle</li>
                                        <li>Internal padded sleeve fits 15″ laptop &amp; unique fabric application</li>
                                        <li>Internal tricot lined tablet sleeve</li>
                                        <li>One large main compartment and zippered</li>
                                        <li>Premium cotton canvas fabric</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection