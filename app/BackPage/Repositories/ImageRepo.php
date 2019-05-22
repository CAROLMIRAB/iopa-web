<?php

namespace App\BackPage\Repositories;

use Illuminate\Support\Facades\DB;
use App\Image;



class ImageRepo
{

    public function allImages()
    {
        $images = Image::all();

        return $images;
    }

    public function saveImages($data)
    {
        $img = new Image();
        $img->fill($data);
        $img->save();

        return $img;
    }

}