@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="ps-section ps-home-top-sellers" style="padding-top: 0px">
            <div class="ps-section__header">
                <figure>
                    <figcaption>Artistes</figcaption>
                    <p>Àlbums, biografies i fotos dels artistes de Satélite K</p>
                </figure>
            </div>
        </div>
        <div class="ps-web__content">
            <div class="row">
                @foreach ($artistes as $artista)
                    <div class="col-xl-3 col-lg-4 col-md-3 col-sm-6 col-6 ">
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <img class="ps-product__image" src='{{ asset("/storage/$artista->foto") }}' alt="Satélite K"/>
                                <a class="ps-product__overlay" href="{{ route('frontend.artistes.show', ['artista' => $artista->slug]) }}"></a>
                                <div class="ps-product__actions">
                                    <a href="{{ route('frontend.artistes.show', ['artista' => $artista->slug]) }}">Veure artista</a>
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
                {{ $artistes->links() }}
            </div>
        </div>
    </div>
@endsection