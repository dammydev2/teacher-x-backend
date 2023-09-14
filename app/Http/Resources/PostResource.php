<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->post_id,
            "post_body" => $this->post_body,
            "date_added" => $this->date_added,
            "user_posted_to" => $this->user_posted_to,
            "post_likes" => $this->post_likes,
            "postpix" => $this->postpix,
            "ext" => $this->ext,
            "views" => $this->views,
            "added_by" => $this->user,
            "comments" => $this->comments
        ];
    }
}
