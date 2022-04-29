<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Artista;
use App\Models\Disc;
use App\Models\Llibre;
use App\Models\Noticia;

use Artesaos\SEOTools\Facades\SEOTools;

class HomeFrontendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        SEOTools::setTitle('Satélite K, Discográfica Barcelona, Discográfica independiente');

        $ordreSlide = Slider::orderBy('ordre')->get();
        $slider1 = $ordreSlide->get(0);
        $slider2 = $ordreSlide->get(1);
        $slider3 = $ordreSlide->get(2);
        $slider4 = $ordreSlide->get(3);
        $artistes = Artista::latest('id')->take(4)->get();
        $discs = Disc::latest('data_publicacio')->take(5)->get();
        $videoLists = videoLists(4);
        
        return view('frontend.inici.index', compact('slider1', 'slider2', 'slider3', 'slider4', 'artistes', 'discs', 'videoLists'));
    }

    public function about()
    {
        SEOTools::setTitle('Discográfica Barcelona, Servicios musicales, Compañia discográfica');
        SEOTools::opengraph()->setUrl('https://www.satelitek.com/quienes-somos-satelitek');

        return view('frontend.about.index');
    }

    public function search(Request $request) 
    {
        SEOTools::setTitle('Artistas Satélite K, Discos Satélite K, Libros Satélite K');

        if($request->input('cercar') === null ||  $request->input('cercar') === '') {
            abort(404);
        } else {
            $artistaCercar = $discCercar = $noticiaCercar = $llibreCercar = $request->input('cercar') ;
        
            $filterArtista = Artista::latest('id')->where('nom','LIKE','%'.$artistaCercar.'%')->paginate(16, ['*'], 'pagina');
            $filterDisc = Disc::latest('data_publicacio')->where('titol','LIKE','%'.$discCercar.'%')->paginate(16, ['*'], 'pagina');
            $filterNoticia = Noticia::latest('id')->where('titol_cat','LIKE','%'.$noticiaCercar.'%')->orWhere('titol_esp','LIKE','%'.$noticiaCercar.'%')->paginate(16, ['*'], 'pagina');
            $filterLlibre = Llibre::latest('data_publicacio')->where('titol_cat','LIKE','%'.$llibreCercar.'%')->orWhere('titol_esp','LIKE','%'.$llibreCercar.'%')->paginate(16, ['*'], 'pagina');

            return view('frontend.search.index', compact('filterArtista', 'filterDisc', 'filterLlibre', 'filterNoticia'));
        }
    }

    // https://github.com/mailerlite/mailerlite-api-v2-php-sdk
    // https://developers.mailerlite.com/reference/add-single-subscriber
    // Request $request
    public function subscribeNewsletter(Request $request)
    {
        $groupsApi = (new \MailerLiteApi\MailerLite(config('services.mailerlite.api_key_mailerlite')))->groups();

        $groupId = 111106111;

        $subscriber = [
            'email' => $request->input("nouSubscriptor")
        ];
        $addedSubscriber = $groupsApi->addSubscriber($groupId, $subscriber); // returns added subscriber

        return redirect()->action('HomeFrontendController@subscribeNewsletterOk');
    }

    public function subscribeNewsletterOk()
    {
        return view('frontend.inici.newsletterOk');
    }

    public function avisLegal()
    {
        SEOTools::setTitle('Aviso legal Satélite K, Discográfica Barcelona');

        return view('frontend.inici.avisLegal');
    }

}
