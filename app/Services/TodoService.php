<?php

namespace App\Services;

use App\Models\Todo;
use App\Repositories\CategoryRepository;
use App\Repositories\TodoRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TodoService
{
    public function __construct(
        public TodoRepository $todos,
        private CategoryRepository $categories
    )
    {}

    public function create(array $data): Todo
    {
        if (isset($data['category_id'])) {
            $category = $this->categories->getById($data['category_id']);
            Gate::authorize('assign', $category);
        }

        $data['user_id'] = Auth::user()->id;

        return $this->todos->create($data);
    }

    public function update(Todo $todo, array $data): Todo
    {
        if (isset($data['category_id'])) {
            $category = $this->categories->getById($data['category_id']);
            Gate::authorize('assign', $category);
        }

        return $this->todos->update($todo, $data);
    }
}
