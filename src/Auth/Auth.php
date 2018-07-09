<?php 
declare(strict_types=1);
namespace Financas\Auth;

class Auth implements AuthInterface
{
    private $jasnyAuth;

    public function __construct(JasnyAuth $jasnyAuth)
    {
        $this->jasnyAuth = $jasnyAuth;
    }
    public function login(array $credencials): bool
    {
        list('email' => $email,'password' => $password) = $credencials;
        return $this->jasnyAuth->login($email,$password) !== null;
    }

    public function check(): bool
    {
        
    }

    public function logout(): void
    {
        
    }

    public function hashPassword(string $password): string
    {
        return $this->jasnyAuth->hashPassword($password);
    }
}