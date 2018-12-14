<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\BackPage\Repositories\SurgeryRepo;
use Validator;

class SurgeryController extends Controller
{

    private $surgeryRepo;

    /**
     * Class construct 
     * 
     * @return void
     */
    public function __construct(SurgeryRepo $surgeryRepo)
    {
        $this->surgeryRepo = $surgeryRepo;
    }

    /**
     * Show all posts view blog
     * 
     * @return view
     */
    public function viewCreateSurgery()
    {
        return view('back.surgery.create');
    }

    /**
     * Stored post
     * 
     * @return view
     */
    public function saveCreateSurgery(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'category_id' => 'required',
                'name' => 'required',
                'slug' => 'required',
                'excerpt' => 'required',
                'body' => 'required',
            ], [
                'category_id' => 'required',
                'name.required' => __('El título es requerido'),
                'excerpt.required' => __('Debe escribir un extracto'),
                'body.required' => __('Debe escribir algo en el blog'),
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator, 'valid')
                    ->withInput();
            }

            $image_url = "";
            $tags = explode(",", $request->tags);


            if ($request->file('image')) {

                $input = [];

                $image = $request->file('image');
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();


                $destinationPath = public_path('/uploads/thumbnail');
                $img = \Image::make($image->getRealPath());
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $input['imagename']);


                $destinationPath = public_path('/uploads/images');
                $image->move($destinationPath, $input['imagename']);

                $image_url = \URL::to('/') . "/uploads/images/" . $input['imagename'];
            }

            $data = array(
                'user_id' => 2,
                'category_id' => $request->category_id,
                'name' => $request->name,
                'slug' => $request->slug,
                'excerpt' => $request->excerpt,
                'body' => $request->body,
                'status' => $request->status,
                'file' => $image_url,
                'tags' => json_encode($tags)
            );

            if (!empty($image_url)) {
                $post = $this->postRepo->createPost($data);
            }

            return redirect()->back();

        } catch (\Exception $ex) {

            $data = [
                'title' => __('Publicación fallida'),
                'message' => __('Ocurrió un error mientras se publicaba su post. Por favor intente nuevamente'),
            ];

            return $ex;
        }
    }

    function titleAndSlug(Request $request)
    {
        $slug = str_slug($request->title, '-');
        $slug_search = $this->postRepo->findSlug($slug);
        if (!empty($slug_search)) {
            $slug_response = $slug . '-2';
        } else {
            $slug_response = $slug;
        }

        $data = [
            'status' => 'success',
            'message' => __(''),
            'data' => [
                'slug' => $slug_response
            ]
        ];

        return response()->json($data);
    }
}
