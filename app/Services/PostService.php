<?php

namespace App\Services;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;

class PostService{

    use ResponseTrait;

    public function addPost(array $data)
    {
        $data["date_added"] = time();
        $data["added_by"] = auth()->user()->username;
        
        $post = DB::table('posts')->insertGetId($data);

        $post = DB::table('posts')->where('post_id',$post)->first();
        return $this->success('post added successfully',$post);
    }

    public function allPost()
    {
        $posts = Post::orderBy('post_id', 'desc')->paginate(100);
        // return $posts;
        $posts = PostResource::collection($posts)->response()->getData(true);
        return $this->success("Post fetched successfully", $posts);
    }
}