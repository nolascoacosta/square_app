<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /** @var User*/
    public $resource;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'first_name' => $this->resource->first_name,
            'last_name' => $this->resource->last_name,
            'user_name' => $this->resource->user_name,
            'email' => $this->resource->email,
            'user_name' => $this->resource->user_name,
            'is_admin' => (boolean) $this->resource->is_admin,
            //'created_at' => (string)$this->resource->created_at,
        ];
    }
}
