<?php

namespace App\Tools\Database\Seeds\Modules\Image;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class WatermarkSeeder extends InstallSeeder
{
    
    public function run()
    {        
        $this->installModule([
            [
                'name'=>'Agregar marca de agua a imagen',
                'url'=>'/tools.php/api/v1/image/watermark/',
                'description'=>'Módulo para agregar marca de agua a imagen',
                'task'=>[
                    'key'=>'task.tools.image.watermark',
                    'name'=>'Acceso a agregar marca de agua a imagen',
                    'description'=>'Permitir agregar marca de agua a imagen',
                    'pattern'=>'create'
                ],
                'events'=>[
                    [
                        'key'=>'event.tools.image.watermark.success',
                        'description'=>'Se agrego marca de agua a imagen correctamente'
                    ],
                    [
                        'key'=>'event.tools.image.watermark',
                        'description'=>'Se solicita agregar marca de agua a imagen'
                    ],
                ],
                'listener'=>'event.tools.image.watermark',
            ],
        ]);        
    }
    
}
