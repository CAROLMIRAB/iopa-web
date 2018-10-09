<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FrontPage\Repositories\PostRepo;


class HomeController extends Controller
{

    private $postRepo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostRepo $postRepo)
    {
        //$this->middleware('auth');
        $this->postRepo = $postRepo;
    }

     /**
     * Show three post home
     * 
     * @return view
     */
    public function home()
    {
       $posts = $this->postRepo->showPostHome();
       return view('front.home.index', compact('posts'));
    }

}
