@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="ps-section ps-home-top-web" style="padding-top: 0px">
            <div class="ps-section__header">
                <figure>
                    <figcaption>@lang("Blog Satélite K")</figcaption>
                    <p>@lang("Notícies dels artistes de Satélite K")</p>
                </figure>
            </div>
        </div>
        <div class="ps-web__content">
            <div class="row">
                @foreach ($noticies as $noticia)
                    <div class="col-xl-3 col-lg-4 col-md-3 col-sm-12">
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <img class="ps-product__image" src='{{ asset("/storage/$noticia->foto") }}' alt="{{ $noticia->titol_cat }} - Satélite K"/>
                                <a class="ps-product__overlay" href="{{ route('frontend.noticies.show', ['noticia' => $noticia->slug]) }}"></a>
                                <div class="ps-product__actions">
                                    <a href="{{ route('frontend.noticies.show', ['noticia' => $noticia->slug]) }}">@lang("Veure noticia")</a>
                                </div>
                            </div>
                            <div class="ps-product__content">
                                <a class="ps-product__title" href="{{ route('frontend.noticies.show', ['noticia' => $noticia->slug]) }}">
                                    {{ ( app()->getLocale() === 'ca' ) ? $noticia->titol_cat : $noticia->titol_esp }}
                                    <br><br>
                                    {{ ( app()->getLocale() === 'ca' ) ? Str::limit(strip_tags($noticia->descripcio_cat), 50, '...') : Str::limit(strip_tags($noticia->descripcio_esp), 50, '...') }}
                                </a>
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