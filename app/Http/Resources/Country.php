<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Country extends JsonResource
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
            'data' => [
                'type' => 'countries',
                'country_id' => $this->id,
                'attributes' => [
                    'title' => $this->title,
                    'iso_code' => $this->iso_code,
                ]

            ]
        ];
    }
}
