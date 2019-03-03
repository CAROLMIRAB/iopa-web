<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\FrontPage\Repositories\WebRepo;
use App\FrontPage\Collections\WebCollection;

class PostController extends Controller
{

    private $postRepo;
    private $postCollect;

    /**
     * Class construct 
     * 
     * @return void
     */
    public function __construct(WebRepo $postRepo, WebCollection $postCollect)
    {
        $this->postRepo = $postRepo;
        $this->postCollect = $postCollect;
    }

    /**
     * Show all posts view blog
     * 
     * @return view
     */
    public function viewAllPosts()
    {
        $postslist = $this->postRepo->showPosts();
        $posts = $this->postCollect->RenderPostsHome($postslist);
        return view('front.sections.all-posts', compact('posts'));
    }

 

    /**
     * View full post content
     * 
     * @return view
     */
    public function viewFullPost($slug)
    {
        $postdata = $this->postRepo->viewPostSlug($slug);
        $post = $this->postCollect->renderPost($postdata);
        return view('front.sections.post', compact('post'));
    }


    /**
     * Show all doctors
     * 
     * @return view
     */
    public function viewAllDoctors()
    {
        
        $doctorsdata = $this->postRepo->showDoctors();
        $doctors = $this->postCollect->renderDoctors($doctorsdata);

        return view('front.sections.all-doctors', compact('doctors'));
    }

     /**
     * Show all doctors
     * 
     * @return view
     */
    public function viewAllExams()
    {
        
        $examsdata = $this->postRepo->showExams();
        $exams = $this->postCollect->renderExams($examsdata);

        return view('front.sections.all-exams', compact('exams'));
    }

      /**
     * Show all doctors
     * 
     * @return view
     */
    public function viewAllOffices()
    {
        
        $offices = $this->postRepo->showOffices();
        //$offices = $this->postCollect->renderOffices($officesdata);

        return view('front.sections.all-offices', compact('offices'));
    }
    
    /**
     * View full doctor content
     * 
     * @return view
     */
    public function viewFullDoctor($slug)
    {
        $postdata = $this->postRepo->viewPostSlug($slug);
        $post = $this->postCollect->renderPost($postdata);
        return view('front.sections.post', compact('post'));
    }

}
