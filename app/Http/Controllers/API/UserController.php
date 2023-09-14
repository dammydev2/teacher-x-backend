<?php

namespace App\Http\Controllers\API;

use App\Actions\LoginAction;
use App\Actions\RegisterAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use ResponseTrait;
    public function register(RegisterRequest $request)
    {
        return (new RegisterAction())->handle($request->all());
    }


    public function login(LoginRequest $request)
    {
        return (new LoginAction())->handle($request->validated());
    }

    public function getClass($classTeach)
    {
        $user = User::where('class', $classTeach)->where('username', '!=', auth()->user()->username)->paginate(6);
        return $this->success($user, 'fetched successfully');
    }

    public function checkFollow($follow)
    {
        $follow = DB::table('follow')->where('following', $follow)->where('being_followed', auth()->user()->username)->get();
        return $this->success($follow, 'follow fetched successfully');
    }

    public function opportunities()
    {
        $opportunities = DB::table('opportunity')->orderBy('id', 'desc')->get();
        return $this->success($opportunities, 'opportunities fetched successfully');
    }

    public function approvedBlogs()
    {
        $blogs = DB::table('blog')->where('approve', 'yes')->orderBy('blog_id', 'desc')->get();
        return $this->success($blogs, 'Blogs fetched successfully');
    }

    public function resources(int $resourceId)
    {
        $resources = DB::table('resources')->where('id', $resourceId)->orderBy('id', 'desc')->first();
        return $this->success('resources fetched successfully', $resources);
    }
}
