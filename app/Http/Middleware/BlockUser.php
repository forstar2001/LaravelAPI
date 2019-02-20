<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\Token;
use Response;

class BlockUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = Token::where('token',$request->token)->first();
        $user  = User::find($token->user_id);
        if($user->is_blocked==1)
        {
            return Response::json([
                'result'   => '',
                'error'    => 'UserBlocked',
                'status'   => 'ERROR'
            ],410);
            
        }
        else
        {
            return $next($request);
        }
    }
}
