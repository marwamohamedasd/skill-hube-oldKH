<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class langController extends Controller
{

// store the lang value in the session

    public function set($lang,Request $request)
    {
           $acceptedLanguage=['Ar','En'];

           if(! in_array($lang,$acceptedLanguage))
           {
                $acceptedLanguage='En';
           }

             $request->session()->put('lang',$lang);

             return back();
    }
}
