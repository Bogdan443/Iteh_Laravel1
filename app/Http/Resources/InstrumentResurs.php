<?php

namespace App\Http\Resources;

use App\Models\Tip;
use App\Models\Proizvodjac;
use Illuminate\Http\Resources\Json\JsonResource;

class InstrumentResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $proizvodjac = Proizvodjac::find($this->proizvodjacId);
        $tip = Tip::find($this->tipId);

        return [
            'id' => $this->id,
            'model' => $this->model,
            'cena' => $this->cena . " RSD",
            'tip' => $tip->tip,
            'proizvodjac' => $proizvodjac->proizvodjac
        ];
    }
}
