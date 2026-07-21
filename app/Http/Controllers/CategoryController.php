<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CreateRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function __construct(private CategoryService $service)
    {}

    public function index(Request $request): ResourceCollection
    {
        $categories = $request->user()->categories;

        return CategoryResource::collection($categories);
    }

    public function create(CreateRequest $request): CategoryResource
    {
        Gate::authorize('create', Category::class);

        $category = $this->service->create($request->name, $request->color);

        return new CategoryResource($category);
    }

    public function show(Category $category): CategoryResource
    {
        Gate::authorize('view', $category);

        return new CategoryResource($category);
    }

    public function update(UpdateRequest $request, Category $category): CategoryResource
    {
        Gate::authorize('update', $category);

        $this->service->categories->update($category, $request->validated());

        return new CategoryResource($category);
    }

    public function destroy(Category $category): Response
    {
        Gate::authorize('delete', $category);

        $this->service->categories->delete($category);

        return response()->noContent();
    }
}
