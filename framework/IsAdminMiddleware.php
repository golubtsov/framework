<?php

namespace framework;

use App\Models\User;
use Closure;
use Framework\Http\Request;
use Framework\Http\Response\Response;

class IsAdminMiddleware extends Middleware
{
    public function handle(Request $request, Closure $next)
    {
        $userId = array_reverse(explode('/', $request->getUrl()))[0];

        $user = (new User())->find($userId);

        if ($user->role == UserRoles::ADMIN) {
            return $next($request);
        }

        echo Response::notFound();
    }
}