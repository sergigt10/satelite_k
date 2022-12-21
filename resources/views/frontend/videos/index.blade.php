@extends('frontend.layouts.app')

@section('content')
    <div class="ps-page ps-page--default">
        <div class="container">
            <div class="ps-section ps-home-top-web" style="padding-top: 0px">
                <div class="ps-section__header">
                    <figure>
                        <figcaption>@lang("Vídeos")</figcaption>
                        <p>@lang("Últims videoclips publicats de Satélite K")</p>
                    </figure>
                </div>
            </div>
            <div class="ps-page__content">
                <div class="ps-portfolio-box">
                    <div class="ps-section__content">
                        <div class="row">
                            @foreach ($videoclips as $videoclip)
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="ps-block--portfolio">
                                        <iframe 
                                            width="262" 
                                            height="263"
                                            loading="lazy" 
                                            src="https://www.youtube.com/embed/{{ $videoclip->embed_youtube }}?rel=0&showinfo=0&modestbranding=1" 
                                            title="{{ $videoclip->titol }}" 
                                            frameborder="0" 
                                            allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                            allowfullscreen>
                                        </iframe>
                                        <div class="ps-block__content">
                                            <p class="videoclip-titol">{{ $videoclip->titol }}</p>
                                            <a class="videoclip-artista" href="{{ route('frontend.artistes.show', ['artista' => $videoclip->artista->slug]) }}">{{ $videoclip->artista->nom }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div>
                            {{ $videoclips->links() }}
                        </div>
                    </div>
                    <div class="ps-section__footer text-center">
                        <a class="ps-link--under" target="_blank" href="https://www.youtube.com/user/SateliteKVideos">@lang("Descobreix-ne més")</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection