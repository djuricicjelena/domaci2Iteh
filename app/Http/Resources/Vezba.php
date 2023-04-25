<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Vezba extends JsonResource
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
            'id'=> $this->id,
            'naziv_vezbe' => $this->naziv_vezbe,
            'opis' => $this->opis,
            'tip_id' => $this->tip_id,
            'trener_id' => $this->trener_id
        ];
    }
}
