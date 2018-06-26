<?php
declare(strict_type = 1);

namespace Financas\Repository;

use Illuminate\Database\Eloquent\Model;

class DefaultRepository implements RepositoryInterface
{
    private $modelClass;
    private $model;

    public function __construct(string $modelClass)
    {
        $this->modelClass = $modelClass;
        $this->model = new $modelClass;
    }
    public function all(): array
    {

    }
    public function create(array $data)
    {

    }
    public function find(int $id)
    {

    }
    public function update(int $id, array $data)
    {

    }
    public function delete(int $id)
    {

    }
}