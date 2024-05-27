@extends('frontend.layouts.app')

@section('styles')
    <style>
        .single iframe {
            width: 50% !important;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="ps-post--detail">
            <div class="ps-post__header">
                <h2>{{ ( app()->getLocale() === 'ca' ) ? $noticia->titol_cat : $noticia->titol_esp }}</h2>
            </div>
            <div class="ps-post__content ps-document">
                <div class="mb-60 text-center">
                    <img src='{{ asset("/storage/$noticia->foto") }}' alt="{{ $noticia->titol_esp }} - Satélite K">
                </div>
                <p class="ps-post__sharing">
                    @lang("Compartir a:")
                    <a href="//www.facebook.com/sharer/sharer.php?u=https://www.satelitek.com/noticias/{{ $noticia->slug }}" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="//twitter.com/intent/tweet?text=A+New+Page&url=https://www.satelitek.com/noticias/{{ $noticia->slug }}" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="//www.linkedin.com/cws/share?url=https://www.satelitek.com/noticias/{{ $noticia->slug }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                </p>
                <div class="ps-post__text" style="max-width: 100%; margin: 0 auto 0px;">
                    @if ( app()->getLocale() === 'ca' )
                        <p>{!! $noticia->descripcio_cat !!}</p>
                    @else
                        <p>{!! $noticia->descripcio_esp !!}</p>
                    @endif
                </div>
                @if ( ( $noticia->embed_1 ) && ( $noticia->embed_2 ) )
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-60 text-center">
                                    {!! $noticia->embed_1 !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-60 text-center">
                                    {!! $noticia->embed_2 !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    @if ( $noticia->embed_1 )
                        <div class="mb-60 text-center single">
                            {!! $noticia->embed_1 !!}
                        </div>
                    @endif
                    @if ( $noticia->embed_2 )
                        <div class="mb-60 text-center single">
                            {!! $noticia->embed_2 !!}
                        </div>
                    @endif
                @endif
                
                @if ( $noticia->foto2 )
                    <div class="mb-60 text-center">
                        <img src='{{ asset("/storage/$noticia->foto2") }}' alt="{{ $noticia->alt_foto2 }}">
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="container-fluid mt-50 mb-30">
        <div class="ps-section__footer text-center"><a class="ps-link--under" href="{{ route('frontend.noticies.index') }}">@lang("Descobreix-ne més")</a></div>
    </div>
@endsection