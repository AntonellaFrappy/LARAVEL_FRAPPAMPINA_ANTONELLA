<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function contacts()
{  
    
    
    
    return view('pages.contacts');
    
    }
    

    public function submit(Request $request)

    {
        //dd($request->all()) array che contiene tutti i dati del form
        //dd($request->email) singolo input
        
        $mail=new App\Mail\Contact();
        
        Mail::to('admin@example.com')->send($mail);
 
        return redirect()->back()->with(['success' => 'Form inviato correttamente.']);

    }
}