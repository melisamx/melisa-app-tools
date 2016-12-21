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
        
        $this->call(Modules\BarcordesSeeder::class);
        
    }
    
}
