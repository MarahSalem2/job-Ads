<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{

    public static $wrap = 'city';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return[
            // 'idetifier' =>$this->id,
            // 'name' => $this->name,
            // 'users_counter' => $this->when(auth('user-api')->user()->hasPermissionTo('Create-City'),5),
        ];

    }
}
