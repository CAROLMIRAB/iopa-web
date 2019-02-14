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
        return view('errors.404');
      }else{
        return view('errors.500');
      }
       
    }

    public function fatal(Request $request)
    {
       
        return view('errors.500');
    }
}
