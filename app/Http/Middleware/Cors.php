<?php
namespace App\Http\Middleware;
use Closure;
class Cors
{
  public function handle($request, Closure $next)
  {
    return $next($request)
       //Url a la que se le dará acceso en las peticiones
      ->header("Access-Control-Allow-Origin", "http://localhost:3000")
      //Url a la que se le dará acceso en las peticiones
      ->header("Access-Control-Allow-Credentials", "true")
      //Métodos que a los que se da acceso
      ->header("Access-Control-Allow-Methods", "GET, POST, PUT, DELETE, OPTIONS")
      //Headers de la petición Origin, X-Requested-With, Content-Type, Accept
      ->header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept, X-Token-Auth, Authorization"); 
  }
}