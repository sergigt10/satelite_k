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
                        <h4 class="ps-product__referencia"><span style="color: #999999; font-size: 17px;">Gènere:</span> {{ $disc->genere->nom_cat }}</h4>
                        <h4 class="ps-product__referencia"><span style="color: #999999; font-size: 17px;">Format:</span> {{ $disc->tipu->nom_cat }}</h4>
                        <h4 class="ps-product__referencia"><span style="color: #999999; font-size: 17px;">Data de publicació:</span> {{ (new DateTime($disc->data_publicacio))->format('d-m-Y') }}</h4>
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
                        {!! $disc->descripcio_cat !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-50 mb-30">
        <div class="ps-section__footer text-center"><a class="ps-link--under" href="{{ route('frontend.discs.index') }}">Descobreix-ne més</a></div>
    </div>
@endsection