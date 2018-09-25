<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FrontPage\Repositories\PostRepo;


class PageController extends Controller
{

    private $postRepo;

    public function __construct(PostRepo $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    /**
     * Show Blog
     * 
     */
    public function blog()
    {
        $posts = $this->postRepo->showPosts();
        return view('front.posts', compact('posts'));
    }
}
