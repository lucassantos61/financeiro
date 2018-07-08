<?php
declare(strict_types=1);
namespace Financas\Repository;

interface RepositoryInterface
{
    public function all(): array;
    
    public function create(array $data);

    public function find(int $id, bool $failIfNotExists = true);

    public function update(int $id, array $data);

    public function delete(int $id);

    public function findByField(string $field, $value):array;
}