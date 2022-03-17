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
                                        <div class="item slick-slide slick-current slick-active" style="width: 555px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;">
                                            <img src='{{ asset("/storage/$disc->foto") }}' alt="Satélite K">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </figure>
                    <div class="mt-30">
                        <!-- <iframe src="https://open.spotify.com/embed/album/6ZG5lRT77aJ3btmArcykra?utm_source=generator&theme=0" width="100%" height="380" frameBorder="0" allowfullscreen=""></iframe> -->
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
                            <a href="{{ $disc->link_spotify }}" target="_blank"><i style="font-size: 30px; position: relative; top: 2px;" class="fa fa-spotify mr-2"></i></a>
                            <a href="{{ $disc->link_apple_music }}" target="_blank"><i style="font-size: 30px;" class="fa fa-apple mr-2"></i></a>
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