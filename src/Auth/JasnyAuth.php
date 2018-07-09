<?php

namespace Financas\Auth;

use Jasny\Auth\User;
use Jasny\Auth\Sessions;
use Financas\Repository\RepositoryInterface;

class JasnyAuth extends \Jasny\Auth
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

    public function fetchUserByUsername($username)
    {   
        return $this->repository->finfByField('email',$username)[0];
    }

    public function getCurrentUserId()
    {

    }

    public function persistCurrentUser()
    {
        
    }
}