<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BackPage\Collections\CoreCollection;
use App\BackPage\Repositories\CoreRepo;
use App\Core\Core;

class CoreController extends Controller
{

    private $coreRepo;
    private $coreCollection;

     /**
     * Class construct 
     * 
     * @return void
     */
    public function __construct(CoreRepo $coreRepo, CoreCollection $coreCollection)
    {
        $this->coreRepo = $coreRepo;
        $this->coreCollection = $coreCollection;
    }

    /**
     * Make slug all pages
     * 
     * @return json
     */
    public function titleAndSlug(Request $request)
    {
        $slug = Core::titleAndSlug($request);

        $data = [
            'status' => 'success',
            'message' => __('Slug creado'),
            'data' => [
                'slug' => $slug
            ]
        ];

        return response()->json($data);
    }

    /**
     * Description of pages web
     * 
     * @return json
     */
    public function descriptionPages(Request $request)
    {
        $data = $this->coreRepo->findGes($request->descriptions_slug);
        $datarender = $this->coreCollection->renderDescriptionPage($request, $data);

        return response()->json([
            'status' => 200,
            'title' => '¡Exitoso!',
            'message' => "Ha modificado las descripciones de forma correcta",
            'data' => json_encode($datarender['generalPages'])
        ]);

    }
}
