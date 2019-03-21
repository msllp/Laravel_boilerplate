<?php
/**
 * Created by PhpStorm.
 * User: ms
 * Date: 18-03-2019
 * Time: 04:22 AM
 */

namespace App\Http\Middleware;
 use Closure;

class SettingOn
{
    public function handle($request, Closure $next)
    {

       if(session('setMS_Config'))return $next;
        session('setMS_Config','true');
       // dd(config('MS.modules'));

        foreach (config('MS.modules.Backend') as $mod => $active ){

            if($active){

                \MS\Core\Helper\Comman::marge_database($mod);

            }

        }


        return $next($request);
    }
}

