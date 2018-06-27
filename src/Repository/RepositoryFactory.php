<?php
declare(strict_types=1);

namespace Financas\Repository;

class RepositoryFactory
{
    public static function factory(string $modelClass)
    {
        return new DefaultRepository($modelClass);
    }
}