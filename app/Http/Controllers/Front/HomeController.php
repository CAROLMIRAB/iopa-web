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
        $data = $this->webRepo->findAllId();
        $dat = $data->content;
        $footerspecialties = $this->webRepo->showAllSpecialtiesWithId(json_decode($dat, true));
        $post = $this->webRepo->showPostHome();
        $posts = $this->webCollection->RenderPostsHome($post);
        return view('front.home.index', compact('posts', 'footerspecialties'));
    }

    public function reserve(Request $request)
    {
        $rut = $request->rut;
        $doctorsdata = $this->webRepo->showDoctors();
        $doctorres = $this->webCollection->renderDoctors($doctorsdata);
        $view = \View::make('front.shared.sectionreserve.medicos', ['doctorres' => $doctorres]);
        $contents = $view->render();
        $contents = (string)$view;
        $data = ['url' => $contents, 'rut' => $rut];
        return $data;
    }

    public function reserveHour()
    {
        $view = \View::make('front.shared.sectionreserve.rutform');
        $contents = $view->render();
        $contents = (string)$view;
        return $contents;
    }

    public function reserveAgenda(Request $request)
    {
        $doctor = $request->name;
        $view = \View::make('front.shared.sectionreserve.agenda');
        $contents = $view->render();
        $contents = (string)$view;
        $data = ['url' => $contents, 'doctor' => $doctor];
        return $data;
    }
}
