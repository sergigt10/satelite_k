@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="ps-shop__header">
            <div class="ps-shop__left">
                <h1>Discs</h1>
            </div>
        </div>
        <div class="ps-shop__content">
            <div class="row">
                @foreach ($discs as $disc)
                    <div class="col-xl-3 col-lg-4 col-md-3 col-sm-6 col-6 ">
                        <div class="ps-product">
                            <div class="ps-product__thumbnail">
                                <img class="ps-product__image" src='{{ asset("/storage/$disc->foto") }}' alt="Satélite K"/>
                                <a class="ps-product__overlay" href="{{ route('frontend.discs.show', ['disc' => $disc->slug]) }}"></a>
                                <div class="ps-product__actions">
                                    <a href="{{ route('frontend.discs.show', ['disc' => $disc->slug]) }}">Veure disc</a>
                                </div>
                            </div>
                            <div class="ps-product__content">
                                <a class="ps-product__title" href="{{ route('frontend.discs.show', ['disc' => $disc->slug]) }}">{{ $disc->titol }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div>
                {{ $discs->links() }}
            </div>
        </div>
    </div>
@endsection