<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            
           'title' => $this->title,
           'type' => $this->get_type(),
           'singers' => $this->singers(),
           'translate' => $this->description,
           'poster' => $this->image('resize'),
           'duration' => $this->duration,
           'released' => $this->released,
           'views' => $this->views,
           'file' => $this->file_url()
        ];
    }
}
