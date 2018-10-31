<?php

namespace App\Repositories;

use App\Models\BaseModel;

class BaseRepository
{
    protected $model = null;

    public function __construct(BaseModel $model)
    {
        $this->model = $model;
    }
}
