<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class propertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);

       return [

        'id' => $this->id,
        'propertyType' => $this->propertyType,
        'propertyName' => $this->propertyName,
        'noOfRoom'=> $this->noOfRoom,
        'streetAddress'=> $this->streetAddress,
        'sector'=> $this->sector,
        'city'=> $this->city,
        
    ];
    }
}
