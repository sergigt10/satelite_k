@extends('frontend.layouts.app')

@section('content')
    <div class="ps-web ps-web--sidebar" style="padding-top: 0px">
        <div class="container">
            <div class="ps-web__container">
                <div class="ps-web__sidebar">
                    <aside class="widget widget_web widget_active-filters">
                        
                    </aside>
                    <aside class="widget widget_web widget_categories">
                        <form id="filtre" action="{{ route('frontend.discs.filter') }}" method="POST">
                            @csrf
                            <div class="ps-web__sorting">
                                <span>@lang("Artista")</span>
                                <select class="ps-select" name="artista" style="width: 100%">
                                    <option></option>
                                    @foreach ($artistes as $artista)
                                        <option value="{{ $artista->id }}">{{ $artista->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="ps-web__sorting">
                                <span>@lang("Tipus")</span>
                                <select class="ps-select" name="tipus" style="width: 100%">
                                    <option></option>
                                    @foreach ($tipus as $tipu)
                                        <option value="{{ $tipu->id }}">{{ ( app()->getLocale() === 'ca' ) ? $tipu->nom_cat : $tipu->nom_esp }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="ps-web__sorting">
                                <span>@lang("Gènere")</span>
                                <select class="ps-select" name="genere" style="width: 100%">
                                    <option></option>
                                    @foreach ($generes as $genere)
                                        <option value="{{ $genere->id }}">{{ ( app()->getLocale() === 'ca' ) ? $genere->nom_cat : $genere->nom_esp }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="ps-web__sorting">
                                <span>@lang("Any")</span>
                                <input name="any" type="number" min="2000" max="2099" step="1" value="" style="width: 100%; text-align: center" placeholder="0000" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"/>
                            </div>
                            <div class="ps-web__footer mt-20"><a class="ps-link--under" href="javascript:;" onclick="document.getElementById('filtre').submit();">@lang("Filtrar")</a></div>
                        </form>
                    </aside>
                </div>
                <div class="ps-web__wrapper">
                    <div class="ps-section ps-home-top-web" style="padding-top: 0px">
                        <div class="ps-section__header">
                            <figure>
                                <figcaption>@lang("Discos")</figcaption>
                                <p>@lang("Referències musicals de tots els artistes de Satélite K")</p>
                            </figure>
                        </div>
                    </div>
                    <div class="ps-web__content">
                        <div class="row">
                            @foreach ($discs as $disc)
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                    <div class="ps-product">
                                        <div class="ps-product__thumbnail">
                                            <img class="ps-product__image" src='{{ asset("/storage/$disc->foto") }}' alt="{{ $disc->titol }} - Satélite K"/>
                                            <a class="ps-product__overlay" href="{{ route('frontend.discs.show', ['disc' => $disc->slug]) }}"></a>
                                            <div class="ps-product__actions">
                                                <a href="{{ route('frontend.discs.show', ['disc' => $disc->slug]) }}">@lang("Veure disc")</a>
                                            </div>
                                        </div>
                                        <div class="ps-product__content">
                                            <a class="ps-product__title" href="{{ route('frontend.discs.show', ['disc' => $disc->slug]) }}"><b>{{ $disc->titol }}</b></a>
                                            <a class="ps-product__title little" href="{{ route('frontend.discs.show', ['disc' => $disc->slug]) }}">{{ $disc->artista->nom }}</a>
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
            </div>
        </div>
    </div>
@endsection