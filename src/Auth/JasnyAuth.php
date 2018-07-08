<?php

namespace Financas\Auth;

use Jasny\Auth\User as JasnyUser;
use Jasny\Auth\Sessions;
use Financas\Repository\RepositoryInterface;

class JasnyAuth extends JasnyUser
{
    private $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository  = $repository;
    }

    public function fetchUserById($id)
    {
        return $this->repository->find($id,false);
    }

    public function fetchUserByName($username)
    {   
        return $this->repository->finfByField('email',$username)[0];
    }
}