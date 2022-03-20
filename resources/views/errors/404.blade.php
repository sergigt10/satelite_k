@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="ps-page__content">
            <div class="ps-web--404">
                <div class="ps-form__header"><i class="icon-confused"></i></div>
                <h3>Error 404. Pàgina no disponible.</h3>
                <p>Torna a la <a href="{{ route('frontend.inici.index') }}">pàgina d'inici</a></p>
            </div>
        </div>
    </div>
@endsection