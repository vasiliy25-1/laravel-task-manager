<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class EloquentRepository
{
    protected string $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    public function getById(int $id): Model
    {
        return $this->model::find($id);
    }

    public function create(array $data): Model
    {
        $model = new $this->model();

        $model->fill($data);
        $model->save();

        return $model;
    }

    public function update(Model $model, array $data): Model
    {
        if (get_class($model) !== $this->model) {
            throw new ModelNotFoundException('Wrong model class.');
        }

        $model->fill($data);
        $model->save();

        return $model;
    }

    public function delete(Model $model): void
    {
        $model->delete();
    }

    abstract protected function getModel(): string;
}
