@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="ps-shop__header">
            <div class="ps-shop__left">
                <h1>Llibres</h1>
            </div>
        </div>
        <div class="ps-shop__content">
            <div class="row">
                @foreach ($llibres as $llibre)
                    <div class="col-xl-3 col-lg-4 col-md-3 col-sm-6 col-6 ">
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <img class="ps-product__image" src='{{ asset("/storage/$llibre->foto") }}' alt="Satélite K"/>
                                <a class="ps-product__overlay" href="{{ route('frontend.llibres.show', ['llibre' => $llibre->slug]) }}"></a>
                                <div class="ps-product__actions">
                                    <a href="{{ route('frontend.llibres.show', ['llibre' => $llibre->slug]) }}">Veure llibre</a>
                                </div>
                            </div>
                            <div class="ps-product__content">
                                <a class="ps-product__title" href="{{ route('frontend.llibres.show', ['llibre' => $llibre->slug]) }}">{{ $llibre->titol_cat }}</a>
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