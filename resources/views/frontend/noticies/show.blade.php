@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="ps-post--detail">
            <div class="ps-post__header">
                <h2>{{ ( app()->getLocale() === 'ca' ) ? $noticia->titol_cat : $noticia->titol_esp }}</h2>
            </div>
            <div class="ps-post__content ps-document">
                <div class="mb-60 text-center">
                    <img src='{{ asset("/storage/$noticia->foto") }}' height=500px alt="{{ $noticia->titol_cat }} - Satélite K">
                </div>
                <div class="ps-post__text">
                    @if ( app()->getLocale() === 'ca' )
                        <p>{!! $noticia->descripcio_cat !!}</p>
                    @else
                        <p>{!! $noticia->descripcio_esp !!}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-50 mb-30">
        <div class="ps-section__footer text-center"><a class="ps-link--under" href="{{ route('frontend.noticies.index') }}">@lang("Descobreix-ne més")</a></div>
    </div>
@endsection