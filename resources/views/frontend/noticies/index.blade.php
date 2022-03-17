@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-section ps-home-top-sellers" style="padding-top: 0px">
                <div class="ps-section__header">
                <figure>
                    <figcaption>Blog</figcaption>
                    <p>Notícies dels artistes de Satélite K</p>
                </figure>
                </div>
            </div>
        </div>
        <div class="ps-shop__content">
            <div class="row">
                @foreach ($noticies as $noticia)
                    <div class="col-xl-3 col-lg-4 col-md-3 col-sm-6 col-6 ">
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <img class="ps-product__image" src='{{ asset("/storage/$noticia->foto") }}' alt="Satélite K"/>
                                <a class="ps-product__overlay" href="{{ route('frontend.noticies.show', ['noticia' => $noticia->slug]) }}"></a>
                                <div class="ps-product__actions">
                                    <a href="{{ route('frontend.noticies.show', ['noticia' => $noticia->slug]) }}">Veure noticia</a>
                                </div>
                            </div>
                            <div class="ps-product__content">
                                <a class="ps-product__title" href="{{ route('frontend.noticies.show', ['noticia' => $noticia->slug]) }}">{{ $noticia->titol_cat }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div>
                {{ $noticies->links() }}
            </div>
        </div>
    </div>
@endsection