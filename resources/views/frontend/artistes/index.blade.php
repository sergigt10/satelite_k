@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="ps-section ps-home-top-web" style="padding-top: 0px">
            <div class="ps-web__header" style="padding-bottom: 30px">
                <div class="ps-web__left">
                    <div class="ps-section__header">
                        <figure>
                            <figcaption>@lang("Artistes")</figcaption>
                            <p>@lang("Àlbums, biografies i fotos dels artistes de Satélite K")</p>
                        </figure>
                    </div>
                </div>
                <div class="ps-web__right">
                    <div class="ps-web__actions">
                        <form action="ordre" method="POST">
                            @csrf
                            <div class="ps-web__sorting mobile-sorting">
                                <span>@lang("Ordenar per")</span>
                                <select class="" name="ordre" onchange="this.form.submit()">
                                    <option value="id" {{ request()->get('ordre') === 'id' ? 'selected' : '' }}>@lang("Addició")</option>
                                    <option value="nom" {{ request()->get('ordre') === 'nom' ? 'selected' : '' }}>@lang("Alfabet")</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-web__content">
            <div class="row">
                @foreach ($artistes as $artista)
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
                {{ $artistes->links() }}
            </div>
        </div>
    </div>
@endsection