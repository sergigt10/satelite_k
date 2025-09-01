@extends('frontend.layouts.app')

@section('content')
    <div class="ps-home-banner">
        <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7500"
            data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1"
            data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1200"
            data-owl-mousedrag="on">
            @if ($slider1)
                <div class="ps-banner--3 bg--top-right" data-background='{{ asset("/storage/$slider1->foto") }}'>
                    <div class="ps-banner__content">
                        <p data-animation-in="fadeInLeft" data-animation-out="animate-out fadeOutRight" style="color:{{$slider1->color_titol_disc}}">
                            {{$slider1->nom_disc}}
                        </p>
                        <h3 data-animation-in="fadeInLeft" data-animation-out="animate-out fadeOutRight" style="color:{{$slider1->color_nom_artista}}">
                            {{$slider1->nom_artista}}
                        </h3>
                        <a class="ps-link--under" href="{{$slider1->url_link}}" target="_blank" data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutDown" style="color:{{$slider1->color_titol_url}}">
                            {{ ( app()->getLocale() === 'ca' ) ? $slider1->titol_link_cat : $slider1->titol_link_esp }}
                        </a>
                    </div>
                </div>
            @endif
            @if ($slider2)
                <div class="ps-banner--3 bg--top-right" data-background='{{ asset("/storage/$slider2->foto") }}'>
                    <div class="ps-banner__content">
                        <p data-animation-in="fadeInRight" data-animation-out="animate-out fadeOutLeft" style="color:{{$slider2->color_titol_disc}}">
                            {{$slider2->nom_disc}}
                        </p>
                        <h3 data-animation-in="fadeInRight" data-animation-out="animate-out fadeOutLeft" style="color:{{$slider2->color_nom_artista}}">
                            {{$slider2->nom_artista}}
                        </h3>
                        <a class="ps-link--under" href="{{$slider2->url_link}}" target="_blank" data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutDown" style="color:{{$slider2->color_titol_url}}">
                            {{ ( app()->getLocale() === 'ca' ) ? $slider2->titol_link_cat : $slider2->titol_link_esp }}
                        </a>
                    </div>
                </div>
            @endif
            @if ($slider3)
                <div class="ps-banner--3 bg--top-right" data-background='{{ asset("/storage/$slider3->foto") }}'>
                    <div class="ps-banner__content">
                        <p data-animation-in="fadeInLeft" data-animation-out="animate-out fadeOutRight" style="color:{{$slider3->color_titol_disc}}">
                            {{$slider3->nom_disc}}
                        </p>
                        <h3 data-animation-in="fadeInLeft" data-animation-out="animate-out fadeOutRight" style="color:{{$slider3->color_nom_artista}}">
                            {{$slider3->nom_artista}}
                        </h3>
                        <a class="ps-link--under" href="{{$slider3->url_link}}" target="_blank" data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutDown" style="color:{{$slider3->color_titol_url}}">
                            {{ ( app()->getLocale() === 'ca' ) ? $slider3->titol_link_cat : $slider3->titol_link_esp }}
                        </a>
                    </div>
                </div>
            @endif
            @if ($slider4)
                <div class="ps-banner--3 bg--top-right" data-background='{{ asset("/storage/$slider4->foto") }}'>
                    <div class="ps-banner__content">
                        <p data-animation-in="fadeInLeft" data-animation-out="animate-out fadeOutRight" style="color:{{$slider4->color_titol_disc}}">
                            {{$slider4->nom_disc}}
                        </p>
                        <h3 data-animation-in="fadeInLeft" data-animation-out="animate-out fadeOutRight" style="color:{{$slider4->color_nom_artista}}">
                            {{$slider4->nom_artista}}
                        </h3>
                        <a class="ps-link--under" href="{{$slider4->url_link}}" target="_blank" data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutDown" style="color:{{$slider4->color_titol_url}}">
                            {{ ( app()->getLocale() === 'ca' ) ? $slider4->titol_link_cat : $slider4->titol_link_esp }}
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="ps-home-product--fullwidth ps-tab-root">
        <div class="ps-section__header">
            <div class="container">
                <div class="ps-section ps-home-top-web" style="padding-top: 0px">
                    <div class="ps-section__header">
                    <figure>
                        <figcaption>@lang('Llançaments')</figcaption>
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
                        <div class="col-lg-12">
                            <div class="ps-product--detail ps-product--carousel-2">
                                <div class="ps-product__header carousel-principal">
                                    <div class="ps-product__thumbnail" data-vertical="false">
                                        <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="5" data-owl-item-xs="1" data-owl-item-sm="5" data-owl-item-md="5" data-owl-item-lg="5" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-center="false">
                                            @foreach ($discs as $disc)
                                                <div class="item">
                                                    <div class="ps-product">
                                                        <div class="ps-product__thumbnail">
                                                            <a class="ps-post__overlay" href="{{ route('frontend.discs.show', ['disc' => $disc->slug]) }}">
                                                                <img class="ps-product__image" src='{{ asset("/storage/$disc->foto") }}' alt="{{ $disc->titol }} - Satélite K"/>
                                                                @if( $disc->tipu->nom_cat === 'Àlbum' )
                                                                    <img class="disco" src="{{ asset('frontend/img/disco.png') }}" alt="Satélite K"> 
                                                                @endif
                                                            </a>
                                                            <div class="ps-product__actions">
                                                                <a href="{{ route('frontend.discs.show', ['disc' => $disc->slug]) }}">
                                                                    @lang("Veure "){{ translatePHP($disc->tipu, 'nom') }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="ps-product__content" style="padding-top: 0px">
                                                            <a class="portada ps-product__title" href="{{ route('frontend.discs.show', ['disc' => $disc->slug]) }}">
                                                                <b>{{ $disc->artista->nom }}</b>
                                                            </a>
                                                            <a class="portada ps-product__title little" href="{{ route('frontend.discs.show', ['disc' => $disc->slug]) }}"> 
                                                                {{ $disc->titol }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                        <div class="col-lg-12">
                                            <div class="ps-product--detail ps-product--carousel-2">
                                                <div class="ps-product__header">
                                                    <div class="ps-product__thumbnail" data-vertical="false">
                                                        <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="4" data-owl-item-md="4" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-center="false">
                                                            @foreach ($artistes as $artista)
                                                                <div class="item">
                                                                    <div class="ps-block--portfolio">
                                                                        <div class="ps-block__thumbnail">
                                                                            <a class="ps-block__overlay" href="{{ route('frontend.artistes.show', ['artista' => $artista->slug]) }}"></a>
                                                                            <img src='{{ asset("/storage/$artista->foto") }}' alt="{{ $artista->nom }} - Satélite K">
                                                                        </div>
                                                                        <div class="ps-block__content">
                                                                            <a href="{{ route('frontend.artistes.show', ['artista' => $artista->slug]) }}">
                                                                                {{ $artista->nom }}
                                                                            </a>
                                                                            <p>
                                                                                {{ ( app()->getLocale() === 'ca' ) ? $artista->genere->nom_cat : $artista->genere->nom_esp }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                        <div class="col-lg-12">
                                            <div class="ps-product--detail ps-product--carousel-2">
                                                <div class="ps-product__header">
                                                    <div class="ps-product__thumbnail" data-vertical="false">
                                                        <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="4" data-owl-item-md="4" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-center="false">
                                                            @foreach ($videoclips as $videoclip)
                                                                <div class="item">
                                                                    <div class="ps-block--portfolio">
                                                                        <iframe 
                                                                            width="262" 
                                                                            height="263" 
                                                                            loading="lazy"
                                                                            src="https://www.youtube.com/embed/{{ $videoclip->embed_youtube }}?rel=0&showinfo=0&modestbranding=1" 
                                                                            title="{{ $videoclip->titol }}" 
                                                                            frameborder="0" 
                                                                            allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                                                            allowfullscreen>
                                                                        </iframe>
                                                                        <div class="ps-block__content">
                                                                            <a href="{{ route('frontend.artistes.show', ['artista' => $artista->slug]) }}">
                                                                                {{ $videoclip->titol }}
                                                                            </a>
                                                                            <a class="videoclip-artista" href="{{ route('frontend.artistes.show', ['artista' => $artista->slug]) }}">{{ $videoclip->artista->nom }}</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-section__footer text-center"><a class="ps-link--under" href="{{ route('frontend.videos.index') }}">@lang('Descobreix-ne més')</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="ps-section__header">
                <figure>
                    <figcaption>@lang('Notícies')</figcaption>
                    <p>@lang('Notícies dels artistes de Satélite K')</p>
                </figure>
            </div>
            <div class="ps-page">
                <div class="ps-page ps-page--default">
                    <div class="container">
                        <div class="ps-page__content">
                            <div class="ps-portfolio-box">
                                <div class="ps-section__content">
                                    <div class="row">
                                    @foreach ($noticies as $noticia)
                                        <div class="col-sm-12 col-xl-3">
                                            <div class="ps-block--portfolio">
                                                <div class="ps-block__thumbnail">
                                                    <a class="ps-block__overlay" href="{{ route('frontend.noticies.show', ['noticia' => $noticia->slug]) }}"></a>
                                                    <img src='{{ asset("/storage/$noticia->foto_mini") }}' alt="{{ $noticia->nom }} - Satélite K">
                                                </div>
                                                <div class="ps-block__content">
                                                    <a href="{{ route('frontend.noticies.show', ['noticia' => $noticia->slug]) }}">
                                                        {{ ( app()->getLocale() === 'ca' ) ?  Str::limit(strip_tags($noticia->titol_cat), 20, '...') : Str::limit(strip_tags($noticia->titol_esp), 20, '...') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                                <div class="ps-section__footer text-center"><a class="ps-link--under" href="{{ route('frontend.noticies.index') }}">@lang('Descobreix-ne més')</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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