<?php

namespace App\Services;

use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;

class FollowService{

    use ResponseTrait;

    public function checkFollow(array $data)
    {
        $post = DB::table('follow')->where('following', $data['following_username'])->where('being_followed', $data['being_followed_username'])->get();
        return $this->success('Follow fetched successfully',$post);
    }
}