<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "id" => $this->id,
            "username" => $this->username,
            "phone" => $this->phone,
            "email" => $this->email,
            "teacher" => $this->teacher,
            "active" => $this->active,
            "last_name" => $this->lname,
            "first_name" => $this->fname,
            "pix" => $this->pix,
            "subject" => $this->subject,
            "country" => $this->country,
            "gender" => $this->gender,
            "class" => $this->class,
            "school" => $this->school,
            "quali" => $this->quali,
            "website" => $this->website,
            "facebook" => $this->facebook,
            "twitter" => $this->twitter,
            "instagram" => $this->instagram,
            "linkedin" => $this->linkedin,
            "join_names" => $this->join_names,
        ];
    }
}
