<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use App;
class LanguageSwitcher
{

    public function handle($request, Closure $next)
    {
        // Make sure current locale exists.
        App::setlocale(Session::has('locale') ? Session::get('locale') : Config::get('app.locale'));


        return $next($request);
    }

}