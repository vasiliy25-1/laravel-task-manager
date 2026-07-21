<?php

namespace App\Repositories;

use App\Models\Category;

/**
 * @method Category create(array $data)
 */
class CategoryRepository extends EloquentRepository
{
    protected function getModel(): string
    {
        return Category::class;
    }
}
