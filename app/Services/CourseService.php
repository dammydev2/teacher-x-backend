<?php

namespace App\Services;

use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CourseService{

    use ResponseTrait;

    public function fetchCategory(string $category)
    {
        $categories = DB::table('course')->where('category', $category)->get();
        return $this->success('Categories fetched successfully',$categories);
    }

    public function getAllCourses()
    {
        $courses = DB::table('course')->orderBy('id', 'desc')->get();
        return $this->success('Categories fetched successfully', $courses);
    }

    public function orderCourse(array $data)
    {

        $reference = $this->createReference();

        $dataToInsert = [
            "username" => $data['username'],
            "price" => $data['price'],
            "course_id" => $data['course_id'],
            "invoice" => $data['invoice'],
            "reference" => $reference
        ];

        $insertedData = tap($dataToInsert, function ($data) {
            DB::table('ordered_course')->insert($data);
        });

        return $this->success('Reference ordered created successfully', $insertedData);

    }

    private function createReference()
    {
        $ref = rand();
        $check = DB::table('ordered_course')->where('reference', $ref)->first();
        if($check){
            $this->createReference();
        }
        return $ref;
    }
}