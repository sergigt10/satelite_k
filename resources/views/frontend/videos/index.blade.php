@extends('frontend.layouts.app')

@section('content')
    <div class="ps-page ps-page--default">
        <div class="container">
            <div class="ps-section ps-home-top-web" style="padding-top: 0px">
                <div class="ps-section__header">
                    <figure>
                        <figcaption>Vídeos</figcaption>
                        <p>Últims videoclips publicats de Satélite K</p>
                    </figure>
                </div>
            </div>
            <div class="ps-page__content">
                <div class="ps-portfolio-box">
                    <div class="ps-section__content">
                        <div class="row">
                            @foreach ($videoLists->items as $item)
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="ps-block--portfolio">
                                        <div class="ps-block__thumbnail">
                                            <a target="_blank" class="ps-block__overlay" href="https://www.youtube.com/watch?v={{ $item->snippet->resourceId->videoId }}"></a>
                                            <img src="{{ $item->snippet->thumbnails->high->url }}" alt="Satélite K">
                                        </div>
                                        <div class="ps-block__content">
                                            <a target="_blank" href="https://www.youtube.com/watch?v={{ $item->snippet->resourceId->videoId }}">
                                                {{ \Illuminate\Support\Str::limit($item->snippet->title, $limit = 150, $end = ' ...') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="ps-section__footer text-center">
                        <a class="ps-link--under" target="_blank" href="https://www.youtube.com/user/SateliteKVideos">Descobreix-ne més</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection