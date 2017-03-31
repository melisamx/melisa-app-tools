<?php namespace App\Tools\Database\Seeds;

use Illuminate\Database\Seeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ModulesSeeder extends Seeder
{
    
    public function run()
    {        
        $this->barcode();
        $this->image();        
    }
    
    public function image()
    {        
        $this->call(Modules\Image\ResizeSeeder::class);
        $this->call(Modules\Image\WatermarkSeeder::class);
    }
    
    public function barcode()
    {        
        $this->call(Modules\BarcordesSeeder::class);
    }
    
}
