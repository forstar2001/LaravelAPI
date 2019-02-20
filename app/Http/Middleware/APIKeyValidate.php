<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use Response;

class APIKeyValidate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if(trim($request->api_key)==Config::get('app.key'))
        {
            return $next($request);
        }
        else
        {
            return Response::json([
                'result'  => '',
                'error' => 'Invalid API Key'.Config::get('app.key'),
                'status'   => 'ERROR'
            ],401);
        }
    }
}
