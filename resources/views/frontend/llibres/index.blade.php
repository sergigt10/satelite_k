@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="ps-section ps-home-top-web" style="padding-top: 0px">
            <div class="ps-section__header">
                <figure>
                    <figcaption>@lang("Llibres")</figcaption>
                    <p>@lang("Llibres") de Satélite K</p>
                </figure>
            </div>
        </div>
        <div class="ps-web__content">
            <div class="row">
                @foreach ($llibres as $llibre)
                    <div class="col-xl-3 col-lg-4 col-md-3 col-sm-12">
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <img class="ps-product__image" src='{{ asset("/storage/$llibre->foto") }}' alt="{{ $llibre->titol_cat }} - Satélite K"/>
                                <a class="ps-product__overlay" href="{{ route('frontend.llibres.show', ['llibre' => $llibre->slug]) }}"></a>
                                <div class="ps-product__actions">
                                    <a href="{{ route('frontend.llibres.show', ['llibre' => $llibre->slug]) }}">@lang("Veure llibre")</a>
                                </div>
                            </div>
                            <div class="ps-product__content">
                                <a class="ps-product__title" href="{{ route('frontend.llibres.show', ['llibre' => $llibre->slug]) }}"><b>{{ ( app()->getLocale() === 'ca' ) ? $llibre->titol_cat : $llibre->titol_esp }}</b></a>
                                <a class="ps-product__title little" href="{{ route('frontend.llibres.show', ['llibre' => $llibre->slug]) }}">{{ $llibre->autor }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div>
                {{ $llibres->links() }}
            </div>
        </div>
    </div>
@endsection