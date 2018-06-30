<?php
declare(strict_types=1);
namespace Financas\Auth;

interface AuthInterface
{
    public function login(array $credencials): bool;
    
    public function check(): bool;

    public function logout(): void;
}