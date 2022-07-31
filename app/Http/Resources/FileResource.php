<?php

namespace App\Http\Resources;

use App\Models\File;
use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function toArray($request)
    {
        $file = new File();
        $className = get_class($file->attachable()->getRelated());
        return [
            'id' => $this->id,
            'attacable_id' => $this->attachable->id,
            'attacable_type' => $className,
            'mimiType' => $this->mimiType,
            'file_name' => $this->file_name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
