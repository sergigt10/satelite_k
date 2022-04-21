@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="ps-product--detail">
            <div class="ps-product__header">
                <div class="ps-product__thumbnail" data-vertical="false">
                    <figure>
                        <div class="ps-wrapper">
                            <div class="ps-product__gallery" data-arrow="true">
                                <img src='{{ asset("/storage/$llibre->foto") }}' alt="{{ $llibre->titol_cat }} - Satélite K">
                            </div>
                        </div>
                    </figure>
                </div>
                <div class="ps-product__info">
                    <div class="ps-product__info-header" style="border-bottom: 1px solid #eaeaea;">
                        <h2 class="ps-product__title">{{ ( app()->getLocale() === 'ca' ) ? $llibre->titol_cat : $llibre->titol_esp }}</h2>
                        <h4 class="ps-product__referencia"><span style="color: #999999; font-size: 17px;">@lang("Autor"):</span> {{ $llibre->autor }}</h4>
                        @if ($llibre->ilustrador)
                            <h4 class="ps-product__referencia"><span style="color: #999999; font-size: 17px;">@lang("Ilustrador/a"):</span> {{ $llibre->ilustrador }}</h4>
                        @endif
                        <h4 class="ps-product__referencia"><span style="color: #999999; font-size: 17px;">@lang("Editorial"):</span> {{ $llibre->editorial }}</h4>
                        <h4 class="ps-product__referencia"><span style="color: #999999; font-size: 17px;">@lang("Data de publicació"):</span> {{ (new DateTime($llibre->data_publicacio))->format('d-m-Y') }}</h4>
                        <div class="mb-30">
                            @if ($llibre->link_compra_fisica)
                                <a href="{{ $llibre->link_compra_fisica }}" target="_blank"><i style="font-size: 30px;" class="fa fa-shopping-cart mr-2"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="ps-product__desc mt-30">
                        @if ( app()->getLocale() === 'ca' )
                            {!! $llibre->descripcio_cat !!}
                        @else
                            {!! $llibre->descripcio_cat !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-50 mb-30">
        <div class="ps-section__footer text-center"><a class="ps-link--under" href="{{ route('frontend.llibres.index') }}">@lang("Descobreix-ne més")</a></div>
    </div>
@endsection