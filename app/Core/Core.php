<?php

namespace App\Core;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\Post;
use App\Surgery;
use App\Doctor;
use App\Exam;
use App\Specialty;

class Core
{

    /**
     * Class construct 
     * 
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Render Slug 
     * 
     * @return $slug
     */
    public static function titleAndSlug($request)
    {
        $slug = str_slug($request->title, '-');
        switch ($request->mod) {
            case 'post':
                {
                    if ($request->title <> $request->title_before && !empty($request->id)) {
                        $slug_response = SlugService::createSlug(Post::class, 'slug', $request->title, ['unique' => true]);
                    } else {
                        $slug_response = $slug;
                    }
                    if ($request->title <> $request->title_before) {
                        $slug_response = SlugService::createSlug(Post::class, 'slug', $request->title, ['unique' => true]);
                    } else {
                        $slug_response = $slug;
                    }
                    break;
                }
            case 'surgery':
                {
                    if ($request->title <> $request->title_before && !empty($request->id)) {
                        $slug_response = SlugService::createSlug(Surgery::class, 'slug', $request->title, ['unique' => true]);
                    } else {
                        $slug_response = $slug;
                    }
                    if ($request->title <> $request->title_before) {
                        $slug_response = SlugService::createSlug(Surgery::class, 'slug', $request->title, ['unique' => true]);
                    } else {
                        $slug_response = $slug;
                    }
                    break;
                }
            case 'doctor':
                {
                    if ($request->title <> $request->title_before && !empty($request->id)) {
                        $slug_response = SlugService::createSlug(Doctor::class, 'slug', $request->title, ['unique' => true]);
                    } else {
                        $slug_response = $slug;
                    }
                    if ($request->title <> $request->title_before) {
                        $slug_response = SlugService::createSlug(Doctor::class, 'slug', $request->title, ['unique' => true]);
                    } else {
                        $slug_response = $slug;
                    }
                    break;
                }
            case 'office':
                {
                    if ($request->title <> $request->title_before && !empty($request->id)) {
                        $slug_response = SlugService::createSlug(Office::class, 'slug', $request->title, ['unique' => true]);
                    } else {
                        $slug_response = $slug;
                    }
                    if ($request->title <> $request->title_before) {
                        $slug_response = SlugService::createSlug(Office::class, 'slug', $request->title, ['unique' => true]);
                    } else {
                        $slug_response = $slug;
                    }
                    break;
                }
            case 'exam':
                {
                    if ($request->title <> $request->title_before && !empty($request->id)) {
                        $slug_response = SlugService::createSlug(Exam::class, 'slug', $request->title, ['unique' => true]);
                    } else {
                        $slug_response = $slug;
                    }
                    if ($request->title <> $request->title_before) {
                        $slug_response = SlugService::createSlug(Exam::class, 'slug', $request->title, ['unique' => true]);
                    } else {
                        $slug_response = $slug;
                    }
                    break;
                }
                case 'specialty':
                {
                    if ($request->title <> $request->title_before && !empty($request->id)) {
                        $slug_response = SlugService::createSlug(Specialty::class, 'slug', $request->title, ['unique' => true]);
                    } else {
                        $slug_response = $slug;
                    }
                    if ($request->title <> $request->title_before) {
                        $slug_response = SlugService::createSlug(Specialty::class, 'slug', $request->title, ['unique' => true]);
                    } else {
                        $slug_response = $slug;
                    }
                    break;
                }
        }

        return $slug_response;
    }


    public static function uploadImage($image)
    {
        $input = [];

        $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();

        $destinationPath = public_path('/uploads/thumbnail');
        $img = \Image::make($image->getRealPath());
        $img->resize(200, 200, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $input['imagename']);

        $destinationPath = public_path('/uploads/images');
        $image->move($destinationPath, $input['imagename']);

        $image_url = $input['imagename'];

        return $image_url;
    }

    public static function renderGes ($data) {
      
        
    }

}
