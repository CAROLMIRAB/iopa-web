<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FrontPage\Repositories\PostRepo;
use App\Category;
use App\Tag;
use App\Post;


class PageController extends Controller
{

    private $postRepo;

    public function __construct(PostRepo $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    /**
     * 
     */
    public function homePosts()
    {
       $posts = $this->postRepo->showPostHome();
       return view('front.home.index', compact('posts'));
    }

    /**
     * Show Blog
     * 
     */
    public function viewAllPosts()
    {
        $posts = $this->postRepo->showPosts();
        return view('front.posts', compact('posts'));
    }

    /**
     * View 
     */
    public function viewFullPost($slug)
    {
       $post = $this->postRepo->viewPostSlug($slug); 
       return view('front.post', compact('post'));
    }
   
}
