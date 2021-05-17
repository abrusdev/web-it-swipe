<?php

namespace App\Http\Resources;

use App\Http\Helpers\CarbonHelper;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'category' => Category::where('id', $this->category_id)->get(['slug', 'name']),
            'description' => $this->description,
            'image' => $this->image,
            'from_now' => CarbonHelper::fromNow($this->created_at),
            'created_at' => Carbon::parse($this->created_at)->toFormattedDateString(),
        ];
    }
}
