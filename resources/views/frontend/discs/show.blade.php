@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="ps-product--detail">
            <div class="ps-product__header">
                <div class="ps-product__thumbnail" data-vertical="false">
                    <figure>
                        <div class="ps-wrapper">
                            <div class="ps-product__gallery" data-arrow="true">
                                <img src='{{ asset("/storage/$disc->foto") }}' alt="Satélite K">
                            </div>
                        </div>
                    </figure>
                    <div class="mt-30">
                        {!! $disc->embed_spotify !!}
                    </div>
                </div>
                <div class="ps-product__info">
                    <div class="ps-product__info-header" style="border-bottom: 1px solid #eaeaea;">
                        <h2 class="ps-product__title">{{ $disc->titol }}</h2>
                        <h2 class="ps-product__subtitle">
                            <a href="{{ route('frontend.artistes.show', ['artista' => $disc->artista->slug]) }}">{{ $disc->artista->nom }}</a>
                        </h2>
                        <h4 class="ps-product__referencia"><span style="color: #999999; font-size: 17px;">@lang('Gènere'):</span> {{ $disc->genere->nom_cat }}</h4>
                        <h4 class="ps-product__referencia"><span style="color: #999999; font-size: 17px;">@lang("Format"):</span> {{ $disc->tipu->nom_cat }}</h4>
                        <h4 class="ps-product__referencia"><span style="color: #999999; font-size: 17px;">@lang("Data de publicació"):</span> {{ (new DateTime($disc->data_publicacio))->format('d-m-Y') }}</h4>
                        <div class="mb-30">
                            @if ($disc->link_spotify)
                                <a href="{{ $disc->link_spotify }}" target="_blank"><i style="font-size: 30px; position: relative; top: 2px;" class="fa fa-spotify mr-2"></i></a>
                            @endif
                            @if ($disc->link_apple_music)
                                <a href="{{ $disc->link_apple_music }}" target="_blank"><i style="font-size: 30px;" class="fa fa-apple mr-2"></i></a>
                            @endif
                            @if ($disc->link_venda_fisica)
                                <a href="{{ $disc->link_venda_fisica }}" target="_blank"><i style="font-size: 30px;" class="fa fa-shopping-cart mr-2"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="ps-product__desc mt-30">
                        @if ( app()->getLocale() === 'ca' )
                            {!! $disc->descripcio_cat !!}
                        @else
                            {!! $disc->descripcio_esp !!}
                        @endif
                    </div>
                </div>
            </div>
            @if( ( count($disc->artista->discs) > 1) )
                <div class="ps-product__content ps-tab-root">
                    <div class="container">
                        <ul class="ps-tab-list">
                            <li class="active"><a href="#tab-1">@lang("Edicions de l'artista")</a></li>
                        </ul>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="row">
                                    @foreach ( $disc->artista->discs as $discsArtista)
                                        @if( $discsArtista->id != $disc->id)
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ps-product">
                                                    <div class="ps-product__thumbnail">
                                                        <a class="ps-post__overlay" href="{{ route('frontend.discs.show', ['disc' => $discsArtista->slug]) }}">
                                                            <img class="ps-product__image" src='{{ asset("/storage/$discsArtista->foto") }}' alt="{{ $discsArtista->titol }} - Satélite K"/>
                                                        </a>
                                                        <div class="ps-product__actions"><a href="{{ route('frontend.discs.show', ['disc' => $discsArtista->slug]) }}">@lang("Veure disc")</a></div>
                                                    </div>
                                                    <div>
                                                        <a href="{{ route('frontend.discs.show', ['disc' => $discsArtista->slug]) }}">{{ $discsArtista->titol }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
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
        <div class="ps-section__footer text-center"><a class="ps-link--under" href="{{ route('frontend.discs.index') }}">@lang("Descobreix-ne més")</a></div>
    </div>
@endsection