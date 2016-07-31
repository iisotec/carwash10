<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
/*use Auth;*/
use Illuminate\Contracts\Auth\Guard;
/*use Closure;*/
use Session;
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    protected $auth;
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /*public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
    }*/

    public function handle($request, Closure $next, $guard = null)
    {
        if ($this->auth->check()) {
            switch ($this->auth->user()->tipo_usuario) 
            {
                case '1':
                    # Administrador 
                    return redirect()->to('is_admin');                        
                    break;

                case '2':
                    # Responsable de Área
                    return redirect()->to('is_cajero');  
                    break;

                case '3':
                    # Secretaria
                    return redirect()->to('is_lavador');  
                    break;
                default:
                    return redirect()->to('login');  
                    break;
            } 
            return redirect('/home');
        }

        return $next($request);
    }
}


