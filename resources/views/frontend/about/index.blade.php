@extends('frontend.layouts.app')

@section('content')
    <div class="container" style="text-align: justify;">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                <div class="ps-section__header">
                    <h1>Qui som?</h1>
                    <ul class="ps-breadcrumb">
                        <li><a href="http://127.0.0.1:8000">Inici</a></li>
                        <li>Qui som</li>
                    </ul>
                    <br>
                    <div class="qui-som">
                        <p>Satélite K es una compañía discográfica nacida en Barcelona, especializada en la producción, promoción y desarrollo musical de talentos y propuestas de interés y riesgo cultural.</p>
                        <p>Bajo este prisma, la compañía crea y desarrolla diferentes sub-sellos discográficos y líneas de trabajo a lo largo de diferentes etapas</p>
                        <p>El primero de ellos en cronología, el sello K Industria Cultural, es desde dónde a partir del año 1992 se editan los primeros trabajos, coincidiendo y por encargo de las Olimpiadas de Barcelona, para las cuales se crean los toques que acompañaron a los atletas en los podios, también conocidos como los toques de entrega de medallas, y las fanfarrias de las ceremonias de inauguración, bajo la dirección del músico y compositor Carles Santos.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 align-self-center">
                <img src="{{ asset('frontend/img/qui-som.jpg') }}" alt="Satélite K">
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-sm-12">
                <div class="qui-som">
                    <p>Más adelante y en asociación con el promotor Albert Salmerón (Producciones Animadas), se crea el sello Cosmos Records, reconocido por ser pionero en producir música electrónica con artistas como Madelman, John Landis Fans, Peanut Pie, Sideral... y sellos como Warp, Studio !K7 o Soul Jazz.</p>
                    <p>A finales de 1997 se constituye formalmente el propio sello Satélite K dando salida a importantes producciones hasta el día de hoy.</p>
                    <p>Bajo esta diversidad musical, forman o han formado parte de la compañía artistas de la talla de Fundación Tony Manero, Solo los Solo, Nubla, Ojos de Brujo, Love of Lesbian, Muchachito Bombo Infierno, Roger Mas, Sisa, Pau Riba, Mayte Martín, Moncho, Calima, Che Sudaka, Quart Primera, Anna Roig, Manu Chao, Kiko Veneno o Carlinhos Brown. Así como también forman parte del catálogo los últimos trabajos de Peret, Patriarcas de la Rumba o los recopilatorios Barcelona Raval Sessions, entre otros.</p>
                    <p>Fiel a su filosofía, Satélite K continúa en la actualidad dando soporte a nuevos talentos tales como BGKO, Joan Rovira, Gemma Humet, Judit Neddermann, Intana o Estricnina, en lo que representa una producción limitada a la par que selecta, mientras que en términos de desarrollo la compañía apuesta por la especialización y una fuerte orientación hacia los servicios discográficos y de apoyo a los creadores. En tal sentido, Satélite K genera importantes sinergias al pertenecer y encabezar un grupo de compañías y marcas comerciales, entre las cuales se encuentran: T-Sunami, en la venta y distribución comercial de CDs, DVDs, libros y merchandising; KZoo Music, en la prestación de servicios de distribución de música digital y marketing on-line; Autoeditarte, en la fabricación y duplicación de soportes multimedia; Diggers, en el management de artistas (BGKO, Adrià Puntí, Joan Rovira…); y Satélite K Editorial, en la edición de libros.</p>
                    <p>Por todo ello y más, Satélite K está considerada en el presente como una compañía de referencia a nivel independiente. Su visión de futuro a nivel organizativo pasa por una estructura interna flexible, con una gran capacidad para la adaptación al cambio y mediante una permanente atención hacia su sector y a las nuevas tecnologías.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ps-site-partners">
    <div class="container">
        <div class="ps-section__content">
            <a href="#"><img src="{{ asset('frontend/img/tsunami.png') }}" alt="Satélite K"></a>
            <a href="#"><img src="{{ asset('frontend/img/kzoo.png') }}" alt="Satélite K"></a>
            <a href="#"><img src="{{ asset('frontend/img/autoeditarte.png') }}" alt="Satélite K"></a>
            <a href="#"><img src="{{ asset('frontend/img/diggers.png') }}" alt="Satélite K"></a>
        </div>
    </div>
</div>
@endsection