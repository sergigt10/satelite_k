<style>
    .eu-popup{
        position:fixed;
        display: flex;
        justify-content: left;
        align-items: center;
        align-content: center;
        padding: 15px;
        z-index: 4242;
        flex-wrap: wrap;
        background-color: white;
        box-shadow: 1px 1px 1px 1px rgba(0,0,0,0.75);
        margin: 20px;
        border-radius: 20px;
        width: 40%;
        left: 30%;
        /* right: 0px; */
        bottom: 0px;
    }
    /* .width-buton {
        width: 110%;
    } */
    @media (max-width: 992px) {
        .eu-popup{
            width: 80% !important;
            left: 0px !important;
            right: 0px !important;
        }
        /* .width-buton {
            width: 100%;
        } */
    }
    .eu-popup-button {
        background-color: white;
        padding: 10px;
        padding-left: 20px;
        padding-right: 20px;
        border: 1px lightgray solid;
        border-radius: 10px;
        font-size: 12px;
        line-height: 1.5;
    }

    .eu-popup-button:last-child {
        margin-left: 10px;
    }

    .eu-popup-button:hover {
        background-color: lightgray;
        cursor: pointer;
    }
</style>
{{-- Popup Container --}}
<div style="{{ config('eu-cookie-consent.popup_style') }}" class="{{ config('eu-cookie-consent.popup_classes') }}">
    {{-- Popup Title gets displayed if its set in the config --}}
    @if(isset($config['title']))
        <div style="width: 100%">
            <p>
                <b style="color: #000">
                    {{-- Popup MultiLanguageSupport defines if the Text is written from the lang file or directly form the Config. --}}
                    @if($multiLanguageSupport)
                        {{ __('eu-cookie-consent::cookies.'.$config['title']) }}
                    @else
                        {{ $config['title'] }}
                    @endif
                </b>
            </p>
        </div>
    @endif
    {{-- Popup Description --}}
    @if(isset($config['description']))
        <div style="width: 100%; font-size: 13px; margin-bottom: 10px">
            @if($multiLanguageSupport)
                {{ __('eu-cookie-consent::cookies.'.$config['description']) }} <a target="_blank" href="{{ route('frontend.inici.politicaCookies') }}" style="font-size: 13px;">@lang('Més informació').</a>
            @else
                {{ $config['description'] }}
            @endif
        </div>
    @endif
    {{-- Popup Form which renders the Cateries and inside of them the single Cookies --}}
    <form action="{{ url(config('eu-cookie-consent.route')) }}" method="POST" id="eu-cookie-consent-form">
        @csrf
        <div class="width-buton">
            @foreach($config['categories'] as $categoryName => $category)
                @include('eu-cookie-consent::category')
            @endforeach
            <div style="margin-top: 5px; display: inline-block; float:right">
                <button id="saveButton" type="submit" class="eu-popup-button">
                    @if($multiLanguageSupport)
                        {{__('eu-cookie-consent::cookies.save')}}
                    @else
                        {{ $config['saveButton'] }}
                    @endif
                </button>
                @if(config('eu-cookie-consent.acceptAllButton'))
                    <a style="font-weight: bold; border: 3px lightgray solid;" class="eu-popup-button"
                            onclick="euCookieConsentSetCheckboxesByClassName('eu-cookie-consent-cookie');">
                        @if($multiLanguageSupport)
                            {{__('eu-cookie-consent::cookies.acceptAllButton')}}
                        @else
                            {{ $config['acceptAllButton'] }}
                        @endif
                    </a>
                @endif
            </div>
        </div>
    </form>
    <script>
        function euCookieConsentSetCheckboxesByClassName(classname) {
            checkboxes = document.getElementsByClassName('eu-cookie-consent-cookie');
            for (i = 0; i < checkboxes.length; i++) {
                checkboxes[i].setAttribute('checked', 'checked');
                checkboxes[i].checked = true;
            }
            document.getElementById("eu-cookie-consent-form").requestSubmit();
        }
    </script>
</div>
