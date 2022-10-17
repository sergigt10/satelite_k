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

    }

}
