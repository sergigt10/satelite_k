<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Artesaos\SEOTools\Facades\SEOTools;

class ContactFrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        SEOTools::setTitle('Servicios musicales Barcelona, Discográfica independiente Barcelona');

        return view('frontend.contact.index');
    }

    public function sendEmail(Request $request){

        $captcha = '';
        $captcha = $_POST['g-recaptcha-response'];
        if($captcha != ''){
            // your secret key
            $secret = env('GOOGLE_SECRET_RECHAPTA');
            $ip = $_SERVER['REMOTE_ADDR'];
            $var = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
            $array = json_decode($var, true);
            if($array['success']){

                $data=[
                    'name' => $request->name,
                    'mail' => $request->mail,
                    'msg' => $request->msg
                ];

                $AdminMessage  = "Formulari de contacte WEB\n\n";
                $AdminMessage .= "Nom i cogmons: ".utf8_decode($data['name'])."\n";
                $AdminMessage .= "Correu: ".utf8_decode($data['mail'])."\n";
                $AdminMessage .= "Comentaris: ".utf8_decode($data['msg'])."\n";
            
                mail("info@satelitek.com", "Formulari de contacte WEB", $AdminMessage, "From: ".$data['mail']);

                // Mail::to('phxhollow13@hotmail.com')->send(new ContactMail($data));

                return back()->with(['message_mail' => trans('Missatge enviat correctament! En breu ens posarem en contacte. Gràcies')]);
            }else{
                // bot pasar
                return back()->with(['error_message_mail' => trans('ERROR! Seleccionar no soy un robot.')]);
            }
        }else{
            // Es un bot
            return back()->with(['error_message_mail' => trans('ERROR! Seleccionar no soy un robot.')]);
        }

    }

}
