<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
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
            'id' => $this->id,
            'pack_id' => $this->pack_id,
            'pack_name' => $this->pack_name,
            'pack_description' => $this->pack_description,
            'pack_type' => $this->pack_type,
            'total_credit' => $this->total_credit,
            'tag_name' => $this->tag_name,
            'validity_month' => $this->validity_month,
            'pack_price' => $this->pack_price,
            'first_attend' => $this->first_attend,
            'additional_credit' => $this->additional_credit,
            'note' => $this->note,
            'pack_alias' => $this->pack_alias,
            'estimate_price' => $this->estimate_price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'subtotal' => number_format($this->pack_price - $this->getGst(), 2, '.', ''),
            'gst' => $this->getGst(),
            'grand_total' => $this->pack_price
        ];
    }

    private function getGst()
    {
        return number_format(0.007 * $this->pack_price, 2, '.', '');
    }
}
