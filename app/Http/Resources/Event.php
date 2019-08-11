<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Event extends JsonResource
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
            'id'         => $this->id,
            'title'      => (string) $this->title,
            'from'       => $this->from,
            'to'         => $this->to,
            'day'        => (string) $this->day
        ];
    }
}
