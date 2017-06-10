<?php

namespace App\Tools\Providers;

use Melisa\Laravel\Providers\RouteServiceProvider as RouteService;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class RouteServiceProvider extends RouteService
{
    
    public $namespace = 'App\Tools\Http\Controllers';
    
}
