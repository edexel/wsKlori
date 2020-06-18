<?php

namespace App\Http\Resources\Web\Actions;

use Illuminate\Http\Resources\Json\JsonResource;

class ActionResource extends JsonResource
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
            'name' => $this->name,
            'icon' => $this->icon,
            'class' => $this->class,
            "action" => $this->action
        ];
    }
}