@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="ps-section ps-home-top-web" style="padding-top: 0px">
            <div class="ps-section__header">
                <figure>
                    <figcaption>@lang('Política de cookies')</figcaption>
                </figure>
            </div>
        </div>
        <div class="ps-web__content">
            <div class="row">
                <div class="col-sm-12">
                    <p>Conforme a lo dispuesto en el articulo 22.2 de la Ley 34/2002, de 11 de julio, de Servicios de la Sociedad de la Información y de Comercio Electrónico (LSSI-CE) vigente, SATELITE K 76 SL debe cumplir con la obligación de informar sobre las cookies que utiliza y sus finalidades.</p>
                    <br>
                    <p>Este sitio web utiliza cookies y/o tecnologías similares que almacenan y recuperan información cuando navegas. Una Cookie es un fichero que se descarga en su ordenador al acceder a determinadas páginas web Las cookies permiten a una página web, entre otras cosas, almacenar y recuperar información sobre los hábitos de navegación de un Usuario o de su equipo y, dependiendo de la información que contenga y de la forma en que utilice su equipo, pueden utilizarse para reconocer al Usuario.<br>
                    Las cookies son esenciales para el funcionamiento de internet, aportando innumerables ventajas en la prestación de servicios interactivos, facilitándole al Usuario la navegación y usabilidad de nuestra web<br>
                    El usuario puede modificar la configuración personalizada AQUI.<br>
                    La información que le proporcionamos a continuación le ayudará a comprender los diferentes tipos de cookies:
                    <br><br>
                    <img src="{{ asset('frontend/img/cookies.jpg') }}" alt="Satélite K">
                    <br>
                    <img src="{{ asset('frontend/img/cookies2.jpg') }}" alt="Satélite K">
                    <br><br>
                    Para conocer más información sobre el tratamiento de datos personales, le recomendamos visitar nuestro apartado “Política de Privacidad”.<br>
                    </p>
                    <p><b>Cookies de terceros</b></p>
                    <p>
                        Google analytics - <a href="https://policies.google.com/technologies/cookies?hl=es" target="blank">Más información</a><br>
                        Facebook - <a href="https://es-la.facebook.com/help/336858938174917" target="blank">Más información</a><br>
                    </p>
                    <p>
                        Téngase en cuenta que, si acepta las cookies de terceros, deberá eliminarlas desde las opciones del navegador o desde el sistema ofrecido por el propio tercero.<br>
                        A continuación le proporcionamos los enlaces de diversos navegadores, a través de los cuales podrá modificar la configuración de su navegador sobre el uso de cookies:<br>
                        • Firefox desde aquí:<br>
                        htp://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-que-los-sitios-we<br>
                        • Chrome desde aquí: htp://support.google.com/chrome/bin/answer.py?hl=es&answer=95647<br>
                        • Explorer desde aquí:<br>
                        htp://windows.microsoft.com/es-es/internet-explorer/delete-manage-cookies#ie=ie-10<br>
                        • Safari desde aquí:<br>
                        htps://support.apple.com/kb/ph17191?locale=es_ES<br>
                        • Opera desde aquí:<br>
                        htps://help.opera.com/en/latest/web-preferences/#cookies<br>
                        Para conocer más información sobre el tratamiento de datos personales, le recomendamos visitar nuestro apartado “Política de Privacidad”.<br>
                        ÚLTIMA ACTUALIZACIÓN: 17 de mayo de 2022
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection