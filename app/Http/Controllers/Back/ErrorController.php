<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ErrorController extends Controller
{
    public function frontNotFound()
    {
        return view('errors.404');
    }

    public function frontFatal()
    {
        return view('errors.500');
    }

    public function backNotFound()
    {
        return view('back.errors.404');
    }
    
    public function backFatal()
    {
        return view('back.errors.500');
    }
}
