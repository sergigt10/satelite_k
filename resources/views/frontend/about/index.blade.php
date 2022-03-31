@extends('frontend.layouts.app')

@section('content')
    <div class="ps-about-intro">
        <div class="ps-section__left">
            <div class="ps-section__content">
                <h5>QUIÉNES SOMOS</h5>
                <h3>Satélite K es una compañía discográfica nacida en Barcelona</h3>
                <p>Satélite K es una compañía discográfica nacida en Barcelona, especializada en la producción, promoción y desarrollo de propuestas artísticas eclécticas y de alto valor musical. <br><br>Especializada en distribución digital, física y en la promoción, Satélite K es uno de los sellos de referencia a nivel estatal y que ha contado en sus filas con los más prestigiosos proyectos musicales durante años, donde se ha consolidado como una oficina de ayuda y acompañamiento para el artista.</p>
            </div>
        </div>
        <div class="ps-section__right"><img src="{{ asset('frontend/img/empresa.jpg') }}" alt="Satélite k"></div>
    </div>
    <div class="ps-about-quote">
        <div class="container ps-section__container">
            <div class="ps-section__left"><img src="{{ asset('frontend/img/empresa2.jpg') }}" alt="Satélite k"></div>
            <div class="ps-section__right">
                <blockquote>
                    <p>Especializada en distribución digital, física y promoción, Satélite K es uno de los sellos de referencia a nivel estatal</p>
                </blockquote>
                <figure>
                    <p>Creada a partir del año 1992 se editan los primeros trabajos, coincidiendo y por encargo de las Olimpiadas de Barcelona, para las cuales se crean los toques que acompañaron a los atletas en los podios, también conocidos como los toques de entrega de medallas, y las fanfarrias de las ceremonias de inauguración, bajo la dirección del músico y compositor Carles Santos.</p>
                </figure>
            </div>
        </div>
      </div>
    <div class="ps-about-moments">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ps-section__header" style="max-width: 100%;">
                        <h4>Diversidad musical</h4>
                        <p>Bajo esta diversidad musical, forman o han formado parte de la compañía artistas de la talla de Fundación Tony Manero, Ojos de Brujo, Love of Lesbian, Muchachito Bombo Infierno, Roger Mas, Sisa, Pau Riba, Judit Neddermann, Mayte Martín, Moncho, Che Sudaka, Manu Chao, Juanito Makandé, Kiko Veneno o Carlinhos Brown. Así como también forman parte del catálogo los últimos trabajos de Peret, Patriarcas de la Rumba, o Green Valley, entre otros.<br><br>Fiel a su filosofía, Satélite K continúa en la actualidad dando soporte a nuevos talentos tales como BGKO, INTANA o Green Valley, en lo que representa una producción limitada a la par que selecta, mientras que en términos de desarrollo la compañía apuesta por la especialización y una fuerte orientación hacia los servicios de apoyo a los creadores.<br><br>
                        Por todo ello y más, Satélite K está considerada en el presente como una compañía de referencia a nivel independiente. Su visión de futuro a nivel organizativo pasa por una estructura interna flexible, con una gran capacidad para la adaptación al cambio y mediante una permanente atención hacia su sector y a las nuevas tecnologías.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-site-partners">
        <div class="container">
            <div class="ps-section__content">
                <a href="#"><img src="{{ asset('frontend/img/tsunami.png') }}" alt="Tsunami"></a>
                <a href="https://kzoomusic.com/" target="_blank"><img src="{{ asset('frontend/img/kzoo.png') }}" alt="Kzoomusic"></a>
                <a href="https://autoeditarte.com/" target="_blank"><img src="{{ asset('frontend/img/autoeditarte.png') }}" alt="Autoeditarte"></a>
                <a href="#"><img src="{{ asset('frontend/img/diggers.png') }}" alt="Satélite K"></a>
                <a href="https://www.rhrn.es/es/" target="_blank"><img src="{{ asset('frontend/img/rhrn.png') }}" alt="RHRN"></a>
                <a href="https://rocketmusic.es/" target="_blank"><img src="{{ asset('frontend/img/rocketmusic.png') }}" alt="Rocket Music"></a>
            </div>
        </div>
    </div>
@endsection