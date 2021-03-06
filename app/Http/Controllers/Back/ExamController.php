<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\BackPage\Repositories\ExamRepo;
use App\BackPage\Repositories\OfficeRepo;
use App\BackPage\Collections\ExamCollection;
use Yajra\DataTables\DataTables;
use App\Core\Core;
use Validator;

class ExamController extends Controller
{

    private $examRepo;
    private $officeRepo;
    private $examCollection;


    /**
     * Class construct 
     * 
     * @return void
     */
    public function __construct(ExamRepo $examRepo, ExamCollection $examCollection, OfficeRepo $officeRepo)
    {
        $this->examRepo = $examRepo;
        $this->officeRepo = $officeRepo;
        $this->examCollection = $examCollection;
    }

    /**
     * Show create view Exam
     * 
     * @return view
     */
    public function viewCreateExam()
    {
        $offices = $this->officeRepo->showAllOffices();
        return view('back.exams.create', compact('offices'));
    }

    /**
     * Show edit view Exam
     * 
     * @return view
     */
    public function viewEditExam(Request $request)
    {
        $examdata = $this->examRepo->showExamSlug($request->slug);
        $exam = $this->examCollection->editData($examdata);
        $offices = $this->officeRepo->showAllOffices();
        $officesexam = $this->examRepo->showOfficesExam($exam->id);
     
        return view('back.exams.edit', compact('offices', 'officesexam', 'exam'));
    }

    /**
     * Show all exams view 
     * 
     * @return view
     */
    public function viewAllExams()
    {
        return view('back.exams.exams');
    }

    /**
     * Stored Exam
     * 
     * @return view
     */
    public function saveCreateExam(Request $request)
    {
        try {
            $offices = $request->office;

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'slug' => 'required',
                'code' => 'required',
                'description' => 'required',
                'image' => 'required'
            ], [
                'slug.required' => __('Ha ocurrido un error publicando este artículo'),
                'name.required' => __('El título es requerido'),
                'code.required' => __('El título es requerido'),
                'description.required' => __('Debe escribir una descripción para la examen'),
                'image.required' => __('Debe agregar una imagen destacada') 
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'title' => '¡Error!',
                    'message' => "Te falta algún campo",
                    'data' => $validator->errors()
                ]);
            }

            $image_url = "";
            
            if (!empty($request->imgBase64)) {
                $image_url = $request->imgBase64;
            }

            $data = array(
                'name' => $request->name,
                'slug' => $request->slug,
                'description' => $request->description,
                'preparation' => $request->preparation,
                'indications' => $request->indications,
                'file' => $image_url,
                'code' => $request->code
            );

            if(isset($offices)){
            $offices = array_map(
                function ($value) {
                    return (int)$value;
                },
                $offices
            );
        }

            if (!empty($image_url)) {
                $exam = $this->examRepo->createExam($data, $offices);
                return response()->json([
                    'status' => 200,
                    'title' => '¡Exitoso!',
                    'message' => "Se ha creado de forma correcta"
                ]);
            }

        } catch (\Exception $ex) {

            $data = [
                'title' => __('Publicación fallida'),
                'message' => __('Ocurrió un error mientras se publicaba su post. Por favor intente nuevamente'),
            ];

            return $ex;
        }
    }

    /**
     * Edit Exam
     * 
     * @return view
     */
    public function editExam(Request $request)
    {
        try {
            $offices = $request->office;
            $validator = Validator::make($request->all(), [
                'slug' => 'required',
                'name' => 'required',
                'office' => 'required',
                'description' => 'required'
            ], [
                'slug.required' => __('Ha ocurrido un error publicando este artículo'),
                'name.required' => __('El título es requerido'),
                'office.required' => __('Debe agregar las sucursales'),
                'description.required' => __('Debe escribir una descripción para la examen')
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'title' => '¡Error!',
                    'message' => "Te falta algún campo",
                    'data' => $validator->errors()
                ]);
            }

            $image_url = "";

            if (!empty($request->imgBase64)) {
                $image_url = $request->imgBase64;
            }

            $offices = array_map(
                function ($value) {
                    return (int)$value;
                },
                $offices
            );

                $data = array(
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'description' => $request->description,
                    'preparation' => $request->preparation,
                    'indications' => $request->indications,
                    'file' => $image_url
                );

           

            if ($data) {
    
           $exam = $this->examRepo->editExamById($data, $request->id_exam, $offices);

                return response()->json([
                    'status' => 200,
                    'title' => '¡Exitoso!',
                    'message' => "Se ha editado de forma correcta"
                ]);

            }
        } catch (\Exception $ex) {

            $data = [
                'title' => __('Publicación fallida'),
                'message' => __('Ocurrió un error mientras se publicaba su post. Por favor intente nuevamente'),
            ];

            return $ex;
        }
    }

    /**
     * Show all exams 
     * 
     * @return $exams
     */
    public function allExams()
    {
        $exams = $this->examRepo->showAllExams();
        $exams = $this->examCollection->allExamCollect($exams);
        $data = [
            'title' => __('Publicación fallida'),
            'message' => __('No se pudo obtener los post'),
            'data' => $exams
        ];

        return Datatables::of($exams)->make(true);
    }

    public function changeStatus(Request $request)
    {
        $exam = $this->examRepo->changeStatusById($request->status, $request->id);
       
        return $exam;
    }

}


