<?php
declare(strict_types=1);
namespace Financas\Models;

use Illuminate\Database\Eloquent\Model;
use Jasny\Auth\User as JasnyUser;

class User extends Model implements JasnyUser
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password'
    ];

    public function getId(): int
    {
        return (int)$this->id;
    }

    public function getUsername(): string
    {
        return $this->email;
    }

    public function getHashedPassword(): string
    {
        return $this->password;
    }

    public function onLogin()
    {
        
    }

    public function onLogout()
    {
        
    }
}