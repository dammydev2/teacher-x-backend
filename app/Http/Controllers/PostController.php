<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckFollowRequest;
use App\Http\Requests\LikesRequest;
use App\Http\Requests\PostRequest;
use App\Services\FollowService;
use App\Services\PostService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    use ResponseTrait;
    
    public function create(PostRequest $request)
    {
        return (new PostService())->addPost($request->all());
    }

    public function checkFollow(CheckFollowRequest $request)
    {
        return (new FollowService())->checkFollow($request->all());
    }

    public function show()
    {
        return (new PostService())->allPost();
    }

    public function fetchLikes(LikesRequest $request)
    {
        $like = DB::table('likes')->where('post_id', $request['post_id'])->where('like_by', $request['username'])->first();
        return $this->success('likes fetched successfully', $like);
    }
}
