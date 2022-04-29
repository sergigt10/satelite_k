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
                    <a class="ps-link--under" href="{{$slider1->url_link}}" target="_blank" data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutDown">{{ ( app()->getLocale() === 'ca' ) ? $slider1->titol_link_cat : $slider1->titol_link_esp }}</a>
                </div>
            </div>
            <div class="ps-banner--3 bg--top-right" data-background='{{ asset("/storage/$slider2->foto") }}'>
                <div class="ps-banner__content">
                    <p data-animation-in="fadeInRight" data-animation-out="animate-out fadeOutLeft">{{$slider2->nom_artista}}</p>
                    <h3 data-animation-in="fadeInRight" data-animation-out="animate-out fadeOutLeft">{{$slider2->nom_disc}}</h3>
                    <a class="ps-link--under" href="{{$slider2->url_link}}" target="_blank" data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutDown">{{ ( app()->getLocale() === 'ca' ) ? $slider2->titol_link_cat : $slider2->titol_link_esp }}</a>
                </div>
            </div>
            <div class="ps-banner--3 bg--top-right" data-background='{{ asset("/storage/$slider3->foto") }}'>
                <div class="ps-banner__content">
                    <p data-animation-in="fadeInLeft" data-animation-out="animate-out fadeOutRight">{{$slider3->nom_artista}}</p>
                    <h3 data-animation-in="fadeInLeft" data-animation-out="animate-out fadeOutRight">{{$slider3->nom_disc}}</h3>
                    <a class="ps-link--under" href="{{$slider3->url_link}}" target="_blank" data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutDown">{{ ( app()->getLocale() === 'ca' ) ? $slider3->titol_link_cat : $slider3->titol_link_esp }}</a>
                </div>
            </div>
            <div class="ps-banner--3 bg--top-right" data-background='{{ asset("/storage/$slider4->foto") }}'>
                <div class="ps-banner__content">
                    <p data-animation-in="fadeInLeft" data-animation-out="animate-out fadeOutRight">{{$slider4->nom_artista}}</p>
                    <h3 data-animation-in="fadeInLeft" data-animation-out="animate-out fadeOutRight">{{$slider4->nom_disc}}</h3>
                    <a class="ps-link--under" href="{{$slider4->url_link}}" target="_blank" data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutDown">{{ ( app()->getLocale() === 'ca' ) ? $slider4->titol_link_cat : $slider4->titol_link_esp }}</a>
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
                        <figcaption>@lang('Catàleg')</figcaption>
                        <p>@lang('Referències musicals de tots els artistes de Satélite K')</p>
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
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-12">
                                <div class="ps-product">
                                    <div class="ps-product__thumbnail">
                                        <a class="ps-post__overlay" href="{{ route('frontend.discs.show', ['disc' => $disc->slug]) }}">
                                            <img class="ps-product__image" src='{{ asset("/storage/$disc->foto") }}' alt="{{ $disc->titol }} - Satélite K"/>
                                        </a>
                                        <div class="ps-product__actions"><a href="{{ route('frontend.discs.show', ['disc' => $disc->slug]) }}">@lang('Veure disc')</a></div>
                                    </div>
                                    <div class="ps-product__content">
                                        <a class="ps-product__title" href="{{ route('frontend.discs.show', ['disc' => $disc->slug]) }}"><b>{{ $disc->titol }}</b></a>
                                        <a class="ps-product__title little" href="{{ route('frontend.discs.show', ['disc' => $disc->slug]) }}">{{ $disc->artista->nom }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="ps-section__footer text-center"><a class="ps-link--under" href="{{ route('frontend.discs.index') }}">@lang('Descobreix-ne més')</a></div>
        </div>
    </div>
    <div class="ps-section ps-home-top-web">
        <div class="container">
            <div class="ps-section__header">
                <figure>
                    <figcaption>@lang('Artistes')</figcaption>
                    <p>@lang('Àlbums, biografies i fotos dels artistes de Satélite K')</p>
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
                                                    <img src='{{ asset("/storage/$artista->foto") }}' alt="{{ $artista->nom }} - Satélite K">
                                                </div>
                                                <div class="ps-block__content">
                                                    <a href="{{ route('frontend.artistes.show', ['artista' => $artista->slug]) }}">{{ $artista->nom }}</a>
                                                    <p>{{ ( app()->getLocale() === 'ca' ) ? $artista->genere->nom_cat : $artista->genere->nom_esp }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                                <div class="ps-section__footer text-center"><a class="ps-link--under" href="{{ route('frontend.artistes.index') }}">@lang('Descobreix-ne més')</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="ps-section__header">
                <figure>
                    <figcaption>@lang('Videoclips')</figcaption>
                    <p>@lang('Últims vídeos de Satélite K')</p>
                </figure>
            </div>
            <div class="ps-page">
                <div class="ps-page ps-page--default">
                    <div class="container">
                        <div class="ps-page__content">
                            <div class="ps-portfolio-box">
                                <div class="ps-section__content">
                                    <div class="row">
                                    @foreach ($videoLists->items as $item)
                                        <div class="col-sm-12 col-xl-3">
                                            <div class="ps-block--portfolio">
                                                <div class="ps-block__thumbnail">
                                                    <a target="_blank" class="ps-block__overlay" href="https://www.youtube.com/watch?v={{ $item->snippet->resourceId->videoId }}"></a>
                                                    <img src="{{ $item->snippet->thumbnails->high->url }}" alt="{{ $item->snippet->title }} - Satélite K">
                                                </div>
                                                <div class="ps-block__content">
                                                    <a target="_blank" href="https://www.youtube.com/watch?v={{ $item->snippet->resourceId->videoId }}">
                                                        {{ \Illuminate\Support\Str::limit($item->snippet->title, $limit = 150, $end = ' ...') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                                <div class="ps-section__footer text-center"><a class="ps-link--under" href="{{ route('frontend.videos.index') }}">@lang('Descobreix-ne més')</a></div>
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
                        <figcaption>@lang('Segueix-nos!')</figcaption>
                        <p>@lang('Les últimes novetats de Satélite K')</p>
                    </figure>
                    </div>
                </div>
            </div>
        </div>
        <!-- LightWidget WIDGET --><script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="https://cdn.lightwidget.com/widgets/b5143cf8f3b05b20b51643d0d1364681.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
    </div>
    <div class="ps-home-subscribe">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-12 ">
                    <figure>
                        <figcaption>@lang('Newsletter')</figcaption>
                        <p>@lang('Rebeu actualitzacions al nostre butlletí')</p>
                    </figure>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 col-12 ">
                    <form class="ps-form--keep-connected" action="newsletter" method="POST">
                        @csrf
                        <i class="icon-envelope"></i>
                        <input class="form-control" type="email" name="nouSubscriptor" placeholder="@lang('Correu electrònic')" required>
                        <button type="submit">@lang('Subscriu-te')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection