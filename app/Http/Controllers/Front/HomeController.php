<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FrontPage\Repositories\WebRepo;
use App\FrontPage\Collections\WebCollection;


class HomeController extends Controller
{

    private $webRepo;
    private $webCollection;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(WebRepo $webRepo, WebCollection $webCollection)
    {
        $this->webRepo = $webRepo;
        $this->webCollection = $webCollection;
    }

     /**
     * Show three post home
     * 
     * @return view
     */
    public function home()
    {
       $post = $this->webRepo->showPostHome();
       $posts = $this->webCollection->RenderPostsHome($post);
       return view('front.home.index', compact('posts'));
    }

}
