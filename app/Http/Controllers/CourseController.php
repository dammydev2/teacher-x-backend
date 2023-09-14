<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderedCourseRequest;
use App\Services\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    
    public function fetchByCategory(string $category)
    {
        return (new CourseService())->fetchCategory($category);
    }

    public function getAll()
    {
        return (new CourseService())->getAllCourses();
    }

    public function addOrderedCourse(OrderedCourseRequest $request)
    {
        return (new CourseService())->orderCourse($request->validated());
    }
}
