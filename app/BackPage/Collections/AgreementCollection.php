<?php

namespace App\BackPage\Collections;

use Carbon\Carbon;
use Illuminate\Support\Collection;


class AgreementCollection
{

    public function renderData($data)
    {
        $dataarr = [];
        $arr = '';
        foreach ($data as $item) {
            $arr = json_decode($item->content, true);
            $dataarr[] = [
                $item->slug => [
                    'name' => $item->name,
                    'description' => $item->description,
                    'image' => $item->image,
                    'content' => $arr
                ]
            ];

        }
        return $dataarr;
    }

}