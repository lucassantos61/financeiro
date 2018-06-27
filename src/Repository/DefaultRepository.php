<?php
declare(strict_types=1);

namespace Financas\Repository;

use Illuminate\Database\Eloquent\Model;

class DefaultRepository implements RepositoryInterface
{
    private $_modelClass;
    private $_model;

    public function __construct(string $modelClass)
    {
        $this->_modelClass = $modelClass;
        $this->_model = new $modelClass;
    }
    public function all(): array
    {
        return $this->_model->all()->toArray();
    }
    public function create(array $data)
    {
        $this->_model->fill($data);
        $this->_model->save();
        return $this->_model;
    }
    public function find(int $id)
    {
        $model  = $this->_model->findOrFail($id);
        return $model;
    }
    public function update(int $id, array $data)
    {

        $model  = $this->_model->findOrFail($id);
        $model->fill($data);
        $model->save();
        return $model;
    }
    public function delete(int $id)
    {
      
        $model  = $this->_model->findOrFail($id);
        $model->delete();  
    }
}