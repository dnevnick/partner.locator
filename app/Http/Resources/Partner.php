<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PartnerType as PartnerTypeResource;

class Partner extends JsonResource
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
                'type' => 'partners',
                'attributes' => [
                    'company' => $this->company,
                    'logo' => $this->logo,
                    'address' => $this->address,
                    'website' => $this->website,
                    'phone' => $this->phone,
                ],
                'relationships' => [
                    'partner_type' => new PartnerTypeResource($this->partnerType),
                    'countries' => new CountryCollection($this->countries),
                    'states' => new StateCollection($this->states),
                ]
            ]
        ];

    }
}
