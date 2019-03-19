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
        $posts = $this->postCollect->renderPostsHome($postslist);
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
     * View full post content
     * 
     * @return view
     */
    public function viewFullExam($slug)
    {
        $examdata = $this->postRepo->viewExamSlug($slug);
        $exam = $this->postCollect->renderExam($examdata);
        return view('front.sections.exam', compact('exam'));
    }

      /**
     * View full surgery content
     * 
     * @return view
     */
    public function viewFullSurgery($slug)
    {
        $surgerydata = $this->postRepo->viewSurgerySlug($slug);
        $surgery = $this->postCollect->renderSurgery($surgerydata);
        return view('front.sections.surgery', compact('surgery'));
    }

     /**
     * Show all surgeries view blog
     * 
     * @return view
     */
    public function viewAllSurgeries()
    {
        $surgerieslist = $this->postRepo->showSurgeries();
        $surgeries = $this->postCollect->renderSurgeries($surgerieslist);
      
        return view('front.sections.all-surgeries', compact('surgeries'));
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
        $officesdata = $this->postRepo->showOffices();
        $offices = $this->postCollect->renderOffices($officesdata);

        dd($offices);
        
        return view('front.sections.all-offices', compact('offices'));
    }
    
    /**
     * Show about us
     * 
     * @return view
     */
    public function viewAboutUs()
    {
        return view('front.sections.aboutus');
    }
    
    /**
     * Show contact
     * 
     * @return view
     */
    public function viewContact()
    {
        return view('front.sections.contact');
    }

     /**
     * Show query
     * 
     * @return view
     */
    public function viewQuery()
    {
        return view('front.sections.query');
    }

    /**
     * Show request
     * 
     * @return view
     */
    public function viewRequest()
    {
        return view('front.sections.requests');
    }
   
     /**
     * Show opinion
     * 
     * @return view
     */
    public function viewOpinion()
    {
        return view('front.sections.opinion');
    }

    /**
     * Show opinion
     * 
     * @return view
     */
    public function viewAgreement()
    {
        return view('front.sections.agreements');
    }

}
