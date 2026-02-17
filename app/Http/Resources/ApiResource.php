<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiResource extends JsonResource
{
    public $status;
    public $message;
    public $resource;

    public function __construct($resource, $status = 200, $message = null)
    {
        parent::__construct($resource);
        $this->status = $status;
        $this->message = $message;
    }

public function toArray($request): array
    {
        return [
            'succes' => $this->status,
            'message' => $this->message,
            'data' => $this->resource,
        ];
    }


}
