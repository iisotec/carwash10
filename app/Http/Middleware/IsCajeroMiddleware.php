<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Contracts\Auth\Guard;
use Session;

class IsCajeroMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $auth;
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    public function handle($request, Closure $next)
    {
        /*$response = $next($request);*/
        switch ($this->auth->user()->tipo_usuario) {
            /*dd("tipo usuario".$this->auth->user()->tipo_usuario);*/
            case '1':
                # Administrador 
                return redirect()->to('lavados');    
                //Session::flash('message-error', 'No tiene privilegios de administrador');             
                break;

            case '2':
                # Responsable de Área
                /*return redirect()->to('lavados');  
                break;*/
                break;

            case '3':
                # Secretaria
                return redirect()->to('vehiculos');  
                break;
            default:
                return redirect()->to('/');  
                break;
        }                
            
        return $next($request);
    }
}
