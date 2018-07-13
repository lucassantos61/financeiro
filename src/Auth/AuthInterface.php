<?php
declare(strict_types=1);
namespace Financas\Auth;

use Financas\Models\UserInterface;


interface AuthInterface
{
    public function login(array $credencials): bool;
    
    public function check(): bool;

    public function logout(): void;

    public function hashPassword(string $password):string;

    public function user(): ?UserInterface;
}