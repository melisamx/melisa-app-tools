<?php

namespace App\Tools\Database\Seeds\Modules\Image;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ResizeSeeder extends InstallSeeder
{
    
    public function run()
    {        
        $this->installModule([
            [
                'name'=>'Redimensionar imagen',
                'url'=>'/tools.php/api/v1/image/resize/',
                'description'=>'Módulo para redimensionar imagen',
                'task'=>[
                    'key'=>'task.tools.image.resize',
                    'name'=>'Acceso a redimensionar imagen',
                    'description'=>'Permitir redimensionar imagen',
                    'pattern'=>'create'
                ],
                'events'=>[
                    [
                        'key'=>'event.tools.image.resize.success',
                        'description'=>'Imagen redimensionada correctamente'
                    ],
                    [
                        'key'=>'event.tools.image.resize',
                        'description'=>'Se solicita redimensionar imagen'
                    ],
                ],
                'listener'=>'event.tools.image.resize',
            ],
        ]);        
    }
    
}
