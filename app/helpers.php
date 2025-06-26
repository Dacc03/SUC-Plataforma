<?php

use Illuminate\Support\Facades\Auth;
use App\Models\User;

/**
 * Retorna el usuario autenticado con tipado explícito para IDEs.
 *
 * @return User|null
 */
function authUser(): ?User
{
    /** @var User|null */
    return Auth::user();
}
