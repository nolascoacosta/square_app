<?php

namespace App\Http\Resources;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /** @var Post */
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
            'title' => $this->resource->title,
            'slug' => $this->resource->slug,
            'description' => $this->resource->description,
            'user' => new UserResource($this->whenLoaded('user')),
            'publication_date' => Carbon::parse($this->resource->publication_date)->diffForHumans(),
        ];
    }
}
