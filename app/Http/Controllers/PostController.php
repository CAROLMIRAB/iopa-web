<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FrontPage\Repositories\PostRepo;

class PostController extends Controller
{

    private $postRepo;

    /**
     * Class construct 
     * 
     * @return void
     */
    public function __construct(PostRepo $postRepo)
    {
        $this->postRepo = $postRepo;
    }

   

    /**
     * Show all posts view blog
     * 
     * @return view
     */
    public function viewAllPosts()
    {
        $posts = $this->postRepo->showPosts();
        return view('front.posts', compact('posts'));
    }

    /**
     * View full post content
     * 
     * @return view
     */
    public function viewFullPost($slug)
    {
       $post = $this->postRepo->viewPostSlug($slug); 
       return view('front.post', compact('post'));
    }
   
    /**
     * View post create
     * 
     * @return view
     */
    public function viewCreatePost()
    {
       return view('back.posts.create');
    }

    public function saveCreatePost(Request $request)
    {
       $post = $this->postRepo->createPost($request->all());
       return $post;
    }
}
