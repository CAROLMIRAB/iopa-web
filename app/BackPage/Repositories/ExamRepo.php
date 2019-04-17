<?php

namespace App\BackPage\Repositories;

use Illuminate\Support\Facades\DB;
use App\Office;
use App\Exam;


class ExamRepo
{

    public function createExam($data, $offices)
    {
        $exam = new Exam();
        $exam->fill($data);
        $exam->save();

        $exam->exam_office()->attach($offices);
        return $exam;
    }

    public function findSlug($slug)
    {
        $exam = Exam::select(DB::raw('count(*) as number_slug'))
        ->where('slug', $slug)
        ->first();
        return $exam;
    }

    public function showAllExams()
    {
        $exam = Exam::select('id', 'name', 'code','description', 'slug', 'preparation', 'indications', 'status')
            ->orderBy('name', 'DESC')
            ->get();
        return $exam;
    }

    public function showOfficesExam($id)
    {
        $office = Office::leftJoin('exam_office', 'offices.id', '=', 'exam_office.office_id')
            ->where('exam_office.exam_id', $id)
            ->orderBy('name', 'ASC')
            ->get();
        return $office;
    }

    public function showExamSlug($slug)
    {
        $exam = Exam::select('id', 'name', 'code','description', 'preparation', 'indications', 'file', 'slug')
            ->where('exams.slug', $slug)
            ->orderBy('id', 'DESC')
            ->first();

        return $exam;
    }

    public function editExamById($data, $id, $offices)
    { 
        $exam = \DB::table('exams')->where('id', $id)->update($data);
        $surg = Exam::find($id);
        $surg->exam_office()->sync($offices);
 
        return $exam;
    }

    public function changeStatusById($status, $id)
    { 
        $exam = \DB::table('exams')->where('id', $id)->update(['status' => $status]);
        return $exam;
    }

}