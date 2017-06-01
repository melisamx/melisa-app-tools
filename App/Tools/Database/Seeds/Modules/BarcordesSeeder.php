<?php

namespace App\Tools\Database\Seeds\Modules;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class BarcordesSeeder extends InstallSeeder
{
    
    public function run()
    {        
        $this->installModule([
            [
                'name'=>'Generar códigos de barras 1D',
                'url'=>'/tools.php/barcodes/render1d/',
                'description'=>'Módulo para generar codigos de barras 1D',
                'task'=>[
                    'key'=>'task.tools.barcodes.render1d',
                    'name'=>'Acceso a generar códigos de barras 1D',
                    'description'=>'Permitir generar códigos de barras 1D',
                    'pattern'=>'create'
                ],
            ],
            [
                'name'=>'Generar códigos de barras 2D',
                'url'=>'/tools.php/barcodes/render2d/',
                'description'=>'Módulo para generar codigos de barras 2D',
                'task'=>[
                    'key'=>'task.tools.barcodes.render2d',
                    'name'=>'Acceso a generar códigos de barras 2D',
                    'description'=>'Permitir generar códigos de barras 2D',
                    'pattern'=>'create'
                ],
            ],
        ]);        
    }
    
}
