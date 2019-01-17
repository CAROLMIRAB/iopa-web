<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Core\Core;

class CoreController extends Controller
{
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
}
