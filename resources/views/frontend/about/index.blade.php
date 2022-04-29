@extends('frontend.layouts.app')

@section('content')
    <div class="ps-about-intro">
        <div class="ps-section__left">
            <div class="ps-section__content">
                <h5>@lang('QUI SOM')</h5>
                <h3>@lang('Satélite K és una companyia discogràfica nascuda a Barcelona')</h3>
                <p>@lang("Satélite K és una companyia discogràfica nascuda a Barcelona, especialitzada en la producció, promoció i desenvolupament de propostes artístiques eclèctiques i d'alt valor musical. <br><br>Especialitzada en distribució digital, física i en la promoció, Satélite K és un dels segells de referència a nivell estatal i que ha comptat a les seves files amb els més prestigiosos projectes musicals durant anys, on s'ha consolidat com una oficina d'ajuda i acompanyament per l'artista.")</p>
            </div>
        </div>
        <div class="ps-section__right"><img src="{{ asset('frontend/img/empresa.jpg') }}" alt="Satélite k"></div>
    </div>
    <div class="ps-about-quote">
        <div class="container ps-section__container">
            <div class="ps-section__left"><img src="{{ asset('frontend/img/empresa2.jpg') }}" alt="Satélite k"></div>
            <div class="ps-section__right">
                <blockquote>
                    <p>@lang("Especialitzada en distribució digital, física i promoció, Satélite K és un dels segells de referència a nivell estatal")</p>
                </blockquote>
                <figure>
                    <p>@lang("Creada a partir de l'any 1992 s'editen els primers treballs, coincidint i per encàrrec de les Olimpíades de Barcelona, per a les quals es creen els tocs que van acompanyar els atletes als podis, també coneguts com els tocs de lliurament de medalles, i les fanfàrries de les cerimònies d'inauguració, sota la direcció del músic i compositor Carles Santos.")</p>
                </figure>
            </div>
        </div>
    </div>
    <div class="ps-about-moments">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ps-section__header" style="max-width: 100%;">
                        <h4>@lang("Diversitat musical")</h4>
                        <p>@lang("Sota aquesta diversitat musical, formen o han format part de la companyia artistes de la talla de Fundació Tony Manero, Ulls de Bruixot, Love of Lesbian, Muchachito Bombo Infierno, Roger Mas, Sisa, Pau Riba, Judit Neddermann, Mayte Martín, Moncho, Che Sudaka, Manu Chao, Juanito Makandé, Kiko Veneno o Carlinhos Brown. Així com també formen part del catàleg els darrers treballs de Peret, Patriarques de la Rumba, o Green Valley, entre d'altres.<br><br> Fidel a la seva filosofia, Satélite K continua actualment donant suport a nous talents com BGKO, INTANA o Green Valley, en el que representa una producció limitada alhora que selecta, mentre que en termes de desenvolupament la companyia aposta per l'especialització i una forta orientació cap als serveis de suport als creadors.<br><br> Per tot això i més, Satélite K està considerada en el present com una companyia de referència a nivell independent. La seva visió de futur a nivell organitzatiu passa per una estructura interna flexible, amb una gran capacitat per a l'adaptació al canvi i mitjançant una atenció permanent cap al seu sector i les noves tecnologies.")</p>
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
                <a href="http://www.diggersmusic.com/" target="_blank"><img src="{{ asset('frontend/img/diggers.png') }}" alt="Satélite K"></a>
                <a href="https://www.rhrn.es/es/" target="_blank"><img src="{{ asset('frontend/img/rhrn.png') }}" alt="RHRN"></a>
                <a href="https://rocketmusic.es/" target="_blank"><img src="{{ asset('frontend/img/rocketmusic.png') }}" alt="Rocket Music"></a>
            </div>
        </div>
    </div>
@endsection