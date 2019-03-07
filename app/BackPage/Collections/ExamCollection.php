<?php

namespace App\BackPage\Collections;

use Carbon\Carbon;
use Illuminate\Support\Collection;


class ExamCollection
{

    public function allExamCollect($exams)
    {
        $allexams = new Collection();

        foreach ($exams as $exam) {

            $date_create = new Carbon($exam->created_at);
            $date_create->setTimezone('America/Santiago');
            $exam->created = $date_create->format('d/m/Y');
    
            $route = route('exam.editview', ['slug' => $exam->slug]);
            $allexams->push([
                'name' => $exam->name,
                'status' => $exam->status,
                'slug' => $exam->slug,
                'file' => $exam->file,
                'created' => $exam->created,
                'route' => $route,
                'id' => $exam->id
            ]);
        }
      
        return $allexams;
    }

    public function editData($exam)
    {
        $exam->image= url('') . "/uploads/images/" . $exam->file;
        $exam->slug_url = route('exam.viewallexams') . "/" . $exam->slug;

        return $exam;
    }
}