<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        // Проверка на админа
        if (Auth::user() and  Auth::user()->is_admin == 1) { // Если пользователь зарегистрирован и is_admin = 1
            return $next($request); // перенаправялем дальше
        }
        return redirect()->back(); // Либо перенаправляем назад
    }
}
