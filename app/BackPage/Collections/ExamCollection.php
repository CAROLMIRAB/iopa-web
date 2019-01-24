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
            $exam->created = $date_create->format('d/m/Y h:i A');
    
            $route = route('exam.editview', ['slug' => $exam->slug]);
            $allsurgeries->push([
                'name' => $exam->name,
                'slug' => $exam->slug,
                'description' => $exam->description,
                'preparation' => $exam->preparation,
                'indications' => $exam->indications,
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
        $exam->slug_url = route('exam.viewposts') . "/" . $exam->slug;

        return $exam;

    }


}