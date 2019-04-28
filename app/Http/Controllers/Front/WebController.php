<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\FrontPage\Repositories\WebRepo;
use App\FrontPage\Collections\WebCollection;
use Yajra\DataTables\Facades\DataTables;
use App\Mail\FormOpinion;
use App\Mail\FormRequests;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Http\FormRequest;

class WebController extends Controller
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
     * Show all posts view blog
     * 
     * @return view
     */
    public function viewAllServices()
    {
        $postslist = $this->postRepo->showServices();
        $posts = $this->postCollect->renderPostsHome($postslist);
        return view('front.sections.all-services', compact('posts'));
    }

    /**
     * View full post content
     * 
     * @return view
     */
    public function viewFullService($slug)
    {
        $postdata = $this->postRepo->viewPostSlug($slug);
        $post = $this->postCollect->renderPost($postdata);
        return view('front.sections.service', compact('service'));
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
     * Show all exams
     * 
     * @return view
     */
    public function viewAllExams()
    {

        return view('front.sections.all-exams');
    }


    /**
     * All exams datatable
     * 
     * @return json
     */
    public function allExams()
    {
        $examsdata = $this->postRepo->showExams();
        $exams = $this->postCollect->renderExams($examsdata);

        return Datatables::of($exams)->make(true);
    }

    /**
     * Show all specialties
     * 
     * @return view
     */
    public function viewAllSpecialties()
    {
        
        $specialtiesdata = $this->postRepo->showSpecialties();
        $specialties = $this->postCollect->renderSpecialties($specialtiesdata);

        return view('front.sections.all-specialties', compact('specialties'));
    }

    /**
     * Show all offices
     * 
     * @return view
     */
    public function viewAllOffices()
    {
        $officesdata = $this->postRepo->showOffices();
        $offices = $this->postCollect->renderOffices($officesdata);
        
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
        $region = '7';
        $communes = $this->postRepo->showComRegion($region);
        return view('front.sections.requests', compact('communes'));
    }
   
     /**
     * Show opinion
     * 
     * @return view
     */
    public function viewOpinion()
    {
        $regions = $this->postRepo->showRegions();
        return view('front.sections.opinion', compact('regions'));
    }

    /**
     * All communes
     * 
     * @return view
     */
    public function allCommunes(Request $request)
    {
        $communes = $this->postRepo->showComRegion($request->id);
        return response()->json($communes);
    }

    /**
     * Show Agreement
     * 
     * @return view
     */
    public function viewAgreement()
    {
        $data = $this->postRepo->findAllAgreement();
        $agreement = $this->postCollect->renderData($data);
        return view('front.sections.agreements', compact('agreement'));
    }

    /**
     * Send form Opinion
     * 
     */
    public function sendOpinion(Request $request)
    {
       $find = $this->postRepo->findConf('contact');
       $office = $this->postRepo->findOfficeSlug($request->office);
       $render = $this->postCollect->renderEmails($office->slug, $find);
     
       Mail::to($render)->send(new FormOpinion($request));

       return redirect()->back();
      
    }

     /**
     * Send form Opinion
     * 
     */
    public function sendRequest(Request $request)
    {
       $find = $this->postRepo->findConf('contact');
       $office = $this->postRepo->findOfficeSlug($request->office);
       $region =  $this->postRepo->showCommuneByName($request->region);
       $render = $this->postCollect->renderEmails($office->slug, $find);
     
       Mail::to($render)->send(new FormRequests($request, $region));

       return redirect()->back();
      
    }

}
