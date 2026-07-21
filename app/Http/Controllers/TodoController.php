<?php

namespace App\Http\Controllers;

use App\Http\Requests\Todo\CreateRequest;
use App\Http\Requests\Todo\UpdateRequest;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use App\Services\TodoService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class TodoController extends Controller
{
    public function __construct(private TodoService $service)
    {}

    public function index(Request $request): ResourceCollection
    {
        $todos = $request->user()->todos;

        return TodoResource::collection($todos);
    }

    public function create(CreateRequest $request): TodoResource
    {
        Gate::authorize('create', Todo::class);

        $todo = $this->service->create($request->validated());

        return new TodoResource($todo);
    }

    public function show(Todo $todo): TodoResource
    {
        Gate::authorize('view', $todo);

        return new TodoResource($todo);
    }

    public function update(UpdateRequest $request, Todo $todo): TodoResource
    {
        Gate::authorize('update', $todo);

        $this->service->update($todo, $request->validated());

        return new TodoResource($todo);
    }

    public function destroy(Todo $todo): Response
    {
        Gate::authorize('delete', $todo);

        $this->service->todos->delete($todo);

        return response()->noContent();
    }
}
