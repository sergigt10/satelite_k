@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-section ps-home-top-web" style="padding-top: 0px">
                <div class="ps-section__header">
                <figure>
                    <figcaption>@lang("Resultats de la cerca:") {{ htmlspecialchars(request()->get('cercar')) }}</figcaption>
                    @if((count($filterArtista) == 0) && (count($filterDisc) == 0) && (count($filterLlibre) == 0) )
                        <p class="mt-20">@lang("No hi ha cap resultat, torna a fer una nova cerca.")</p>
                    @endif
                </figure>
                </div>
            </div>
        </div>
        @if(count($filterArtista) > 0)
            <div class="ps-section__header">
                <div class="ps-section ps-home-top-web" style="padding-top: 0px">
                    <div class="ps-section__header">
                    <figure>
                        <figcaption>@lang("Artistes")</figcaption>
                    </figure>
                    </div>
                </div>
            </div>
            <div class="ps-web__content">
                <div class="row">
                    @foreach ($filterArtista as $artista)
                        <div class="col-xl-3 col-lg-4 col-md-3 col-sm-12">
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <img class="ps-product__image" src='{{ asset("/storage/$artista->foto") }}' alt="{{ $artista->nom }} - Satélite K"/>
                                    <a class="ps-product__overlay" href="{{ route('frontend.artistes.show', ['artista' => $artista->slug]) }}"></a>
                                    <div class="ps-product__actions">
                                        <a href="{{ route('frontend.artistes.show', ['artista' => $artista->slug]) }}">@lang("Veure artista")</a>
                                    </div>
                                </div>
                                <div class="ps-product__content">
                                    <a class="ps-product__title" href="{{ route('frontend.artistes.show', ['artista' => $artista->slug]) }}">{{ $artista->nom }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div>
                    {{ $filterArtista->links() }}
                </div>
            </div>
        @endif

        @if(count($filterDisc) > 0)
            <div class="ps-section__header">
                <div class="ps-section ps-home-top-web" style="padding-top: 0px">
                    <div class="ps-section__header">
                    <figure>
                        <figcaption>@lang("Discos")</figcaption>
                    </figure>
                    </div>
                </div>
            </div>
            <div class="ps-web__content">
                <div class="row">
                    @foreach ($filterDisc as $disc)
                        <div class="col-xl-3 col-lg-4 col-md-3 col-sm-6 col-6 ">
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <img class="ps-product__image" src='{{ asset("/storage/$disc->foto") }}' alt="{{ $disc->titol }} - Satélite K"/>
                                    <a class="ps-product__overlay" href="{{ route('frontend.discs.show', ['disc' => $disc->slug]) }}"></a>
                                    <div class="ps-product__actions">
                                        <a href="{{ route('frontend.discs.show', ['disc' => $disc->slug]) }}">@lang("Veure disc")</a>
                                    </div>
                                </div>
                                <div class="ps-product__content">
                                    <a class="ps-product__title" href="{{ route('frontend.discs.show', ['disc' => $disc->slug]) }}">{{ $disc->titol }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div>
                    {{ $filterDisc->links() }}
                </div>
            </div>
        @endif

        @if(count($filterLlibre) > 0)
            <div class="ps-section__header">
                <div class="ps-section ps-home-top-web" style="padding-top: 0px">
                    <div class="ps-section__header">
                    <figure>
                        <figcaption>@lang("Llibres")</figcaption>
                    </figure>
                    </div>
                </div>
            </div>
            <div class="ps-web__content">
                <div class="row">
                    @foreach ($filterLlibre as $llibre)
                        <div class="col-xl-3 col-lg-4 col-md-3 col-sm-6 col-6 ">
                            <div class="ps-product">
                                <div class="ps-product__thumbnail">
                                    <img class="ps-product__image" src='{{ asset("/storage/$llibre->foto") }}' alt="{{ $llibre->titol_cat }} - Satélite K"/>
                                    <a class="ps-product__overlay" href="{{ route('frontend.llibres.show', ['llibre' => $llibre->slug]) }}"></a>
                                    <div class="ps-product__actions">
                                        <a href="{{ route('frontend.llibres.show', ['llibre' => $llibre->slug]) }}">@lang("Veure llibre")</a>
                                    </div>
                                </div>
                                <div class="ps-product__content">
                                    <a class="ps-product__title" href="{{ route('frontend.llibres.show', ['llibre' => $llibre->slug]) }}">{{ ( app()->getLocale() === 'ca' ) ? $llibre->titol_cat : $llibre->titol_esp }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div>
                    {{ $filterLlibre->links() }}
                </div>
            </div>
        @endif

    </div>
@endsection