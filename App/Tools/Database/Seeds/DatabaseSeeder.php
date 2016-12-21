<?php namespace App\Tools\Database\Seeds;

use Illuminate\Database\Seeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
                
        $this->call(ApplicationSeeder::class);
        $this->call(ModulesSeeder::class);
        
    }
    
}
