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
                                <span>Artista:</span>
                                <select class="ps-select" name="artista" style="width: 100%">
                                    <option></option>
                                    @foreach ($artistes as $artista)
                                        <option value="{{ $artista->id }}">{{ $artista->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="ps-web__sorting">
                                <span>Tipus:</span>
                                <select class="ps-select" name="tipus" style="width: 100%">
                                    <option></option>
                                    @foreach ($tipus as $tipu)
                                        <option value="{{ $tipu->id }}">{{ $tipu->nom_cat }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="ps-web__sorting">
                                <span>Gènere:</span>
                                <select class="ps-select" name="genere" style="width: 100%">
                                    <option></option>
                                    @foreach ($generes as $genere)
                                        <option value="{{ $genere->id }}">{{ $genere->nom_cat }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="ps-web__sorting">
                                <span>Any:</span>
                                <input name="any" type="number" min="2000" max="2099" step="1" value="" style="width: 100%" placeholder="0000" onKeyDown="return false"/>
                            </div>
                            <div class="ps-web__footer mt-20"><a class="ps-link--under" href="javascript:;" onclick="document.getElementById('filtre').submit();">Filtrar</a></div>
                        </form>
                    </aside>
                </div>
                <div class="ps-web__wrapper">
                    <div class="ps-section ps-home-top-sellers" style="padding-top: 0px">
                        <div class="ps-section__header">
                            <figure>
                                <figcaption>Discs</figcaption>
                                <p>Single, EP, Àlbum i Packs dels artistes de Satélite K</p>
                            </figure>
                        </div>
                    </div>
                    <div class="ps-web__content">
                        <div class="row">
                            @foreach ($discs as $disc)
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6">
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
            </div>
        </div>
    </div>
@endsection