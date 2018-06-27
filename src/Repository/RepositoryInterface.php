<?php
declare(strict_types=1);
namespace Financas\Repository;

interface RepositoryInterface
{
    public function all(): array;
    public function create(array $data);
    public function find(int $id);
    public function update(int $id, array $data);
    public function delete(int $id);
}