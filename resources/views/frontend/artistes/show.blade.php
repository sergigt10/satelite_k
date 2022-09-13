@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="ps-product--detail">
            <div class="ps-product__header">
                <div class="ps-product__thumbnail" data-vertical="false">
                    <figure>
                        <div class="ps-wrapper">
                            <div class="ps-product__gallery" data-arrow="true">
                                <img src='{{ asset("/storage/$artista->foto") }}' alt="{{ $artista->nom }} - Satélite K">
                            </div>
                        </div>
                    </figure>
                </div>
                <div class="ps-product__info">
                    <div class="ps-product__info-header" style="border-bottom: 1px solid #eaeaea;">
                        <h2 class="ps-product__title">{{ $artista->nom }}</h2>
                        <h4 class="ps-product__referencia"><span style="color: #999999; font-size: 17px;">@lang('Gènere'):</span> {{ ( app()->getLocale() === 'ca' ) ? $artista->genere->nom_cat : $artista->genere->nom_esp }} </h4>
                        @if ($artista->link_web)
                            <h4 class="ps-product__referencia">
                                <a href="{{ $artista->link_web }}" target="_blank">
                                    <span style="color: #999999; font-size: 17px;">@lang("Pàgina web:")</span> <i style="font-size: 20px;" class="fa fa-globe"></i>
                                </a>
                            </h4>
                        @endif
                    </div>
                    <div class="ps-product__desc mt-30">
                        @if ( app()->getLocale() === 'ca' )
                            {!! $artista->biografia_cat !!}
                        @else
                            {!! $artista->biografia_esp !!}
                        @endif
                    </div>
                </div>
            </div>
            @if (count($artista->discs) > 0)
                <div class="ps-product__content ps-tab-root">
                    <div class="container">
                        <ul class="ps-tab-list">
                            <li class="active"><a href="#tab-1">@lang("Edicions")</a></li>
                        </ul>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="row">
                                    @foreach ($artista->discs as $discsArtista)
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail">
                                                    <a class="ps-post__overlay" href="{{ route('frontend.discs.show', ['disc' => $discsArtista->slug]) }}">
                                                        <img class="ps-product__image" src='{{ asset("/storage/$discsArtista->foto") }}' alt="Satélite K"/>
                                                    </a>
                                                    <div class="ps-product__actions"><a href="{{ route('frontend.discs.show', ['disc' => $discsArtista->slug]) }}">@lang("Veure disc")</a></div>
                                                </div>
                                                <div>
                                                    <a href="{{ route('frontend.discs.show', ['disc' => $discsArtista->slug]) }}">{{ $discsArtista->titol }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (count($artista->noticies) > 0)
                <div class="ps-product__content ps-tab-root">
                    <div class="container">
                        <ul class="ps-tab-list">
                            <li class="active"><a href="#tab-noticies">@lang("Notícies")</a></li>
                        </ul>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-noticies">
                                <div class="row">
                                    @foreach ($artista->noticies as $noticiesArtista)
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail">
                                                    <a class="ps-post__overlay" href="{{ route('frontend.noticies.show', ['noticia' => $noticiesArtista->slug]) }}">
                                                        <img class="ps-product__image" src='{{ asset("/storage/$noticiesArtista->foto") }}' alt="Satélite K"/>
                                                    </a>
                                                    <div class="ps-product__actions"><a href="{{ route('frontend.noticies.show', ['noticia' => $noticiesArtista->slug]) }}">@lang("Veure noticia")</a></div>
                                                </div>
                                                <div>
                                                    <a href="{{ route('frontend.noticies.show', ['noticia' => $noticiesArtista->slug]) }}">
                                                        {{ ( app()->getLocale() === 'ca' ) ? $noticiesArtista->titol_cat : $noticiesArtista->titol_esp }}
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
            @endif
        </div>
    </div>
    <div class="container-fluid mt-50 mb-30">
        <div class="ps-section__footer text-center"><a class="ps-link--under" href="{{ route('frontend.artistes.index') }}">@lang("Descobreix-ne més")</a></div>
    </div>
@endsection