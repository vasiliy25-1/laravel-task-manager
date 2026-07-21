<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Auth;

class CategoryService
{
    public function __construct(public CategoryRepository $categories)
    {}

    public function create(string $name, ?string $color): Category
    {
        $user_id = Auth::user()->id;
        $color ??= config('app.category_default_color');

        return $this->categories->create(compact('user_id', 'name', 'color'));
    }
}
