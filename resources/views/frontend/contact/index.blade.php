@extends('frontend.layouts.app')

@section('content')
    <div class="ps-page__content">
        <div class="container">
            <div class="ps-section__header">
                <div class="ps-section ps-home-top-web" style="padding-top: 0px">
                    <div class="ps-section__header">
                    <figure>
                        <figcaption>@lang("Contacte")</figcaption>
                        <p>@lang("Facilita'ns les teves dades i t'atendrem com més aviat millor")</p>
                    </figure>
                    </div>
                </div>
            </div>
            <div class="ps-contact">
                <div class="ps-section__left">
                    @if(session('message_mail'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message_mail') }}
                        </div>
                    @endif
                    <form class="ps-form--contact" action="{{route('frontend.sendMail')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form-group">
                                    <label>@lang("Nom i cognoms") <sup>*<sup></sup></sup></label>
                                    <input class="form-control" type="text" placeholder="" name="name" required>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form-group">
                                    <label>@lang("Correu electrònic")<sup>*<sup></sup></sup></label>
                                    <input class="form-control" type="email" placeholder="" name="mail" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>@lang("Missatge")<sup>*<sup></sup></sup></label>
                            <textarea class="form-control" rows="6" placeholder="" name="msg" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" id="privacidad" name="privacidad" value="privacidad" required>&nbsp;&nbsp;<a href="{{ route('frontend.inici.politica') }}" target="_blank">@lang("He llegit i accepto la política de privadesa")</a>
                        </div>
                        <div class="form-group submit">
                            <button class="ps-btn ps-btn--black">@lang("Enviar missatge")</button>
                        </div>
                    </form>
                </div>
                <div class="ps-section__right">
                    <figure>
                        <figcaption>@lang("Segueix-nos!")</figcaption>
                    </figure>
                    <ul class="ps-list--social">
                        <li><a href="https://www.facebook.com/satelitek" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/satelitek" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.youtube.com/user/SateliteKVideos" target="_blank"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="https://open.spotify.com/user/1125413741" target="_blank"><i class="fa fa-spotify"></i></a></li>
                        <li><a href="https://www.instagram.com/satelite_k/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                    <figure>
                        <figcaption>Satélite K</figcaption>
                        <p>C/Pallars 65, 5º 4ª</p>
                        <p>08018 Barcelona</p>
                        <p>T.+34 93 320 86 08</p>
                        <p>info@satelitek.com</p>
                    </figure>
                </div>
            </div>
        </div>
        <br><br>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1496.5281588405878!2d2.1879868!3d41.3945833!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4a39e77b89a49%3A0x13a9adc087178e01!2sSat%C3%A9lite%20k!5e0!3m2!1ses!2ses!4v1663574357641!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection