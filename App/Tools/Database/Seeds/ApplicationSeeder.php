<?php namespace App\Tools\Database\Seeds;

use Melisa\Laravel\Database\InstallSeeder;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ApplicationSeeder extends InstallSeeder
{
    
    public function run()
    {
        
        $this->installApplication('tools', [
            'name'=>'Tools',
            'description'=>'Application Tools',
            'nameSpace'=>'Melisa.tools',
            'typeSecurity'=>'art',
            'version'=>'1.1.1'
        ]);
        
    }
    
}
