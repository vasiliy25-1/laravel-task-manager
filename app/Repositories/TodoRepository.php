<?php

namespace App\Repositories;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Model;

/**
 * @method Todo create(array $data)
 * @method Todo update(Model|Todo $model, array $data)
 */
class TodoRepository extends EloquentRepository
{
    protected function getModel(): string
    {
        return Todo::class;
    }
}
