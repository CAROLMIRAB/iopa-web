<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class ErrorController extends Controller
{
    
    public function notFound(Request $request)
    { 
      if(\Auth::check()){  
        return view('back.errors.404');
      }else{
        return view('front.errors.404');
      }
    }

    public function fatal(Request $request)
    {
        if(\Auth::check()){  
            return view('back.errors.500');
          }else{
            return view('front.errors.500');
          }
    }

    public function notAuthorize(Request $request)
    {
        if(\Auth::check()){  
            return view('back.errors.403');
          }
    }
}
