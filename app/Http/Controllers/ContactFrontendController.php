<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactFrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('frontend.contact.index');
    }

    public function sendEmail(Request $request){

        $data=[
            'name' => $request->name,
            'mail' => $request->mail,
            'msg' => $request->msg
        ];

        Mail::to('phxhollow13@hotmail.com')->send(new ContactMail($data));

        return back()->with(['message_mail' => 'Missatge enviat correctament! En breu ens posarem en contacte. Gràcies']);

    }

}
