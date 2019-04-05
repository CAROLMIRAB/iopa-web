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

    public function reserve(Request $request)
    {
        $doctorsdata = $this->webRepo->showDoctors();
        $doctorres = $this->webCollection->renderDoctors($doctorsdata);
        $view = \View::make('front.shared.sectionreserve.medicos', ['doctorres' => $doctorres, 'rut' => $request->rut]);
        $contents = $view->render();
        $contents = (string) $view;
        return $contents;
    }

    public function reserveHour()
    {
        $view = \View::make('front.shared.sectionreserve.rutform');
        $contents = $view->render();
        $contents = (string) $view;
        return $contents;
    }
}
