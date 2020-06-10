<?php

namespace App\Http\Resources\Web\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'token' => $this->token,
            'username' => $this->username,
            'email' => $this->email,
            "admin" => $this->admin == 1 ? true : false,
            'created_at' => is_object($this->created_at) ? $this->created_at->toDateTimeString() : $this->created_at
        ];
    }
}