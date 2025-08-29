@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="ps-product--detail">
            <div class="ps-product__header">
                <div class="ps-product__thumbnail" data-vertical="false">
                    <figure>
                        <div class="ps-wrapper">
                            {{-- <div class="ps-product__gallery" data-arrow="true">
                                <img src='{{ asset("/storage/$artista->foto") }}' alt="{{ $artista->nom }} - Satélite K">
                            </div> --}}
                            <div class="ps-section__content">
                                <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="60" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-center="true" data-owl-mousedrag="on">
                                    <div class="ps-block--portfolio--carousel">
                                        <img src='{{ asset("/storage/$artista->foto") }}' alt="{{ ( $artista->alt_foto != '' ) ? $artista->alt_foto : $artista->nom.', Satélite K' }}">
                                    </div>
                                    @if ( $artista->foto_2 )
                                        <div class="ps-block--portfolio--carousel">
                                            <img src='{{ asset("/storage/$artista->foto_2") }}' alt="{{ ( $artista->alt_foto_2 != '' ) ? $artista->alt_foto_2 : $artista->nom.', Satélite K' }}">
                                        </div>
                                    @endif
                                    @if ( $artista->foto_3 )
                                        <div class="ps-block--portfolio--carousel">
                                            <img src='{{ asset("/storage/$artista->foto_3") }}' alt="{{ ( $artista->alt_foto_3 != '' ) ? $artista->alt_foto_3 : $artista->nom.', Satélite K' }}">
                                        </div>
                                    @endif
                                    @if ( $artista->foto_4 )
                                        <div class="ps-block--portfolio--carousel">
                                            <img src='{{ asset("/storage/$artista->foto_4") }}' alt="{{ ( $artista->alt_foto_4 != '' ) ? $artista->alt_foto_4 : $artista->nom.', Satélite K' }}">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </figure>
                </div>
                <div class="ps-product__info">
                    <div class="ps-product__info-header" style="border-bottom: 1px solid #eaeaea;">
                        <h2 class="ps-product__title">{{ $artista->nom }}</h2>
                        <h4 class="ps-product__referencia"><span style="color: #999999; font-size: 17px;">@lang('Gènere'):</span> {{ ( app()->getLocale() === 'ca' ) ? $artista->genere->nom_cat : $artista->genere->nom_esp }} </h4>
                        @if ($artista->link_web)
                            <h4 class="ps-product__referencia">
                                <a href="{{ $artista->link_web }}" target="_blank">
                                    <span style="color: #999999; font-size: 17px;">@lang("Pàgina web:")</span> <i style="font-size: 20px;" class="fa fa-globe"></i>
                                </a>
                            </h4>
                        @endif
                        @if ($artista->link_instagram || $artista->link_youtube || $artista->link_tiktok || $artista->link_spotify)
                            <h4 class="ps-product__referencia">
                                <span style="color: #999999; font-size: 17px;">@lang("Xarxes socials:")</span>
                                @if( $artista->link_instagram )
                                    <a href="{{ $artista->link_instagram }}" target="_blank">
                                        <span style="color: #999999; font-size: 17px;"></span> <i style="font-size: 20px;" class="fa fa-instagram"></i>&nbsp;
                                    </a>
                                @endif
                                @if( $artista->link_youtube )
                                    <a href="{{ $artista->link_youtube }}" target="_blank">
                                        <span style="color: #999999; font-size: 17px;"></span> <i style="font-size: 20px;" class="fa fa-youtube"></i>&nbsp;
                                    </a>
                                @endif
                                @if ( $artista->link_tiktok )
                                    <a href="{{ $artista->link_tiktok }}" target="_blank">
                                        <span style="color: #999999; font-size: 17px;"></span> <img src="{{ asset('frontend/img/tik-tok-artista.png') }}" alt="Satélite K">&nbsp;
                                    </a>
                                @endif
                                @if ( $artista->link_spotify )
                                    <a href="{{ $artista->link_spotify }}" target="_blank">
                                        <span style="color: #999999; font-size: 17px;"></span> <i style="font-size: 20px;" class="fa fa-spotify"></i>
                                    </a>
                                @endif
                            </h4>
                        @endif
                    </div>
                    <div class="ps-product__desc mt-30">
                        @if ( app()->getLocale() === 'ca' )
                            {!! $artista->biografia_cat !!}
                        @else
                            {!! $artista->biografia_esp !!}
                        @endif
                    </div>
                </div>
            </div>
            @if (count($artista->discs) > 0)
                <div class="ps-product__content ps-tab-root">
                    <div class="container">
                        <ul class="ps-tab-list">
                            <li class="active"><a href="#tab-1">@lang("Edicions")</a></li>
                        </ul>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">

                                @if((new \Jenssegers\Agent\Agent())->isDesktop())
                                    <div class="row">
                                        @foreach ($artista->discs as $discsArtista)
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="ps-product">
                                                    <div class="ps-product__thumbnail">
                                                        <a class="ps-post__overlay" href="{{ route('frontend.discs.show', ['disc' => $discsArtista->slug]) }}">
                                                            <img class="ps-product__image" src='{{ asset("/storage/$discsArtista->foto") }}' alt="{{ $discsArtista->titol }} - Satélite K"/>
                                                            @if( $discsArtista->tipu->nom_cat === 'Àlbum' )
                                                                <img class="disco" src="{{ asset('frontend/img/disco.png') }}" alt="Satélite K"> 
                                                            @endif
                                                        </a>
                                                        <div class="ps-product__actions">
                                                            <a href="{{ route('frontend.discs.show', ['disc' => $discsArtista->slug]) }}">
                                                                @lang("Veure "){{ translatePHP($discsArtista->tipu, 'nom') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <a href="{{ route('frontend.discs.show', ['disc' => $discsArtista->slug]) }}">{{ $discsArtista->titol }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                @if((new \Jenssegers\Agent\Agent())->isMobile())
                                    <div class="row">
                                        <div id="menys-discos">
                                            @foreach ($artista->discs->take(3) as $discsArtista)
                                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                                    <div class="ps-product">
                                                        <div class="ps-product__thumbnail">
                                                            <a class="ps-post__overlay" href="{{ route('frontend.discs.show', ['disc' => $discsArtista->slug]) }}">
                                                                <img class="ps-product__image" src='{{ asset("/storage/$discsArtista->foto") }}' alt="{{ $discsArtista->titol }} - Satélite K"/>
                                                                @if( $discsArtista->tipu->nom_cat === 'Àlbum' )
                                                                    <img class="disco" src="{{ asset('frontend/img/disco.png') }}" alt="Satélite K"> 
                                                                @endif
                                                            </a>
                                                            <div class="ps-product__actions">
                                                                <a href="{{ route('frontend.discs.show', ['disc' => $discsArtista->slug]) }}">
                                                                    @lang("Veure "){{ translatePHP($discsArtista->tipu, 'nom') }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <a href="{{ route('frontend.discs.show', ['disc' => $discsArtista->slug]) }}">{{ $discsArtista->titol }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        
                                        @if(count($artista->discs) > 3)
                                            <div class="container-fluid mt-50 mb-30">
                                                <div class="ps-section__footer text-center">
                                                    <a class="ps-link--under" onclick="myFunction()">
                                                        @lang("Descobreix-ne més")
                                                    </a>
                                                </div>
                                            </div>
                                        @endif

                                        <div id="mes-discos">
                                            @foreach ($artista->discs as $discsArtista)
                                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                                    <div class="ps-product">
                                                        <div class="ps-product__thumbnail">
                                                            <a class="ps-post__overlay" href="{{ route('frontend.discs.show', ['disc' => $discsArtista->slug]) }}">
                                                                <img class="ps-product__image" src='{{ asset("/storage/$discsArtista->foto") }}' alt="{{ $discsArtista->titol }} - Satélite K"/>
                                                                @if( $discsArtista->tipu->nom_cat === 'Àlbum' )
                                                                    <img class="disco" src="{{ asset('frontend/img/disco.png') }}" alt="Satélite K"> 
                                                                @endif
                                                            </a>
                                                            <div class="ps-product__actions">
                                                                <a href="{{ route('frontend.discs.show', ['disc' => $discsArtista->slug]) }}">
                                                                    @lang("Veure "){{ translatePHP($discsArtista->tipu, 'nom') }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <a href="{{ route('frontend.discs.show', ['disc' => $discsArtista->slug]) }}">{{ $discsArtista->titol }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (count($artista->noticies) > 0)
                <div class="ps-product__content ps-tab-root">
                    <div class="container">
                        <ul class="ps-tab-list">
                            <li class="active"><a href="#tab-noticies">@lang("Notícies")</a></li>
                        </ul>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-noticies">
                                <div class="row">
                                    @foreach ($artista->noticies as $noticiesArtista)
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail">
                                                    <a class="ps-post__overlay" href="{{ route('frontend.noticies.show', ['noticia' => $noticiesArtista->slug]) }}">
                                                        <img class="ps-product__image" src='{{ asset("/storage/$noticiesArtista->foto_mini") }}' alt="Satélite K"/>
                                                    </a>
                                                    <div class="ps-product__actions"><a href="{{ route('frontend.noticies.show', ['noticia' => $noticiesArtista->slug]) }}">@lang("Veure noticia")</a></div>
                                                </div>
                                                <div>
                                                    <a href="{{ route('frontend.noticies.show', ['noticia' => $noticiesArtista->slug]) }}">
                                                        {{ ( app()->getLocale() === 'ca' ) ? $noticiesArtista->titol_cat : $noticiesArtista->titol_esp }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (count($artista->videoclips) > 0)
                <div class="ps-product__content ps-tab-root">
                    <div class="container">
                        <ul class="ps-tab-list">
                            <li class="active"><a href="#tab-noticies">@lang("Videoclips")</a></li>
                        </ul>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-noticies">
                                <div class="row">
                                    @foreach ($artista->videoclips as $videoclipsArtista)
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="ps-product">
                                                <iframe 
                                                    width="262" height="263" 
                                                    src="https://www.youtube.com/embed/{{ $videoclipsArtista->embed_youtube }}?rel=0&showinfo=0&modestbranding=1" 
                                                    title="{{ $videoclipsArtista->titol }}" 
                                                    frameborder="0" 
                                                    allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                                    allowfullscreen>
                                                </iframe>
                                                <div>
                                                    <br>
                                                    {{ $videoclipsArtista->titol }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="container-fluid mt-50 mb-30">
        <div class="ps-section__footer text-center"><a class="ps-link--under" href="{{ route('frontend.artistes.index') }}">@lang("Descobreix-ne més")</a></div>
    </div>

    @section('scripts')
        <script>
            function myFunction() {
                document.getElementById("mes-discos").style.display = "block";
                document.getElementById("menys-discos").style.display = "none";
            }
        </script>
    @endsection

@endsection