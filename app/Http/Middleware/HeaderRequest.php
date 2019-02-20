<?php
namespace App\Http\Middleware;

use Closure;
use Response;
use App\Models\User;
use App\Models\Token;
use Request;
use Config;

class HeaderRequest
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
        if(trim(Request::header('APIKEY'))==Config::get('app.key'))
        {
            $token = Token::where('token',Request::header('TOKEN'))->first();
            if(count($token)>0){
                $user  = User::find($token->user_id);
                if($user->is_blocked==1)
                {
                    return Response::json([
                        'result'   => '',
                        'error'    => 'UserBlocked',
                        'status'   => 'ERROR'
                    ],410);

                }
                return $next($request);
            }else{
                return Response::json([
                    'result'  => '',
                    'error' => 'InvalidAccessToken',
                    'status'   => 'ERROR'
                ],401);
            }
        }
        else
        {
            return Response::json([
                'result'  => '',
                'error' => 'Invalid API Key',
                'status'   => 'ERROR'
            ],401);
        }
        
        
    }
}
