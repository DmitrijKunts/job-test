<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LuckyResource extends JsonResource
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
            'points' => $this->points,
            'win_lose' => $this->win_lose,
            'win_summ' => $this->win_summ,
        ];
    }
}
