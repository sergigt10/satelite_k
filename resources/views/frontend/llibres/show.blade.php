@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="ps-product--detail">
            <div class="ps-product__header">
                <div class="ps-product__thumbnail" data-vertical="false">
                    <figure>
                        <div class="ps-wrapper">
                            <div class="ps-product__gallery" data-arrow="true">
                                <img src='{{ asset("/storage/$llibre->foto") }}' alt="Satélite K">
                            </div>
                        </div>
                    </figure>
                </div>
                <div class="ps-product__info">
                    <div class="ps-product__info-header" style="border-bottom: 1px solid #eaeaea;">
                        <h2 class="ps-product__title">{{ $llibre->titol_cat }}</h2>
                        <h4 class="ps-product__referencia"><span style="color: #999999; font-size: 17px;">Autor:</span> {{ $llibre->autor }}</h4>
                        <h4 class="ps-product__referencia"><span style="color: #999999; font-size: 17px;">Ilustrador/a:</span> {{ $llibre->ilustrador }}</h4>
                        <h4 class="ps-product__referencia"><span style="color: #999999; font-size: 17px;">Editorial:</span> {{ $llibre->editorial }}</h4>
                        <h4 class="ps-product__referencia"><span style="color: #999999; font-size: 17px;">Data de publicació:</span> {{ (new DateTime($llibre->data_publicacio))->format('d-m-Y') }}</h4>
                        <div class="mb-30">
                            @if ($llibre->link_compra_fisica)
                                <a href="{{ $llibre->link_venda_fisica }}" target="_blank"><i style="font-size: 30px;" class="fa fa-shopping-cart mr-2"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="ps-product__desc mt-30">
                        {!! $llibre->descripcio_cat !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-50 mb-30">
        <div class="ps-section__footer text-center"><a class="ps-link--under" href="{{ route('frontend.llibres.index') }}">Descobreix-ne més</a></div>
    </div>
@endsection