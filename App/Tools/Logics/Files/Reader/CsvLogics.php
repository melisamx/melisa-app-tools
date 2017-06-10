<?php

namespace App\Tools\Logics\Files\Reader;

use Melisa\core\LogicBusiness;

/**
 * Read file csv and return data
 *
 * @author Luis Josafat Heredia Contreras
 */
class CsvLogics
{
    use LogicBusiness;
    
    protected $data;
    protected $delimiter = ',';
    
    public function init($filename)
    {
        if( !$this->fileExist($filename)) {
            return false;
        }
        
        return $this->read($filename);
    }
    
    public function setDelimiter($delimiter)
    {
        $this->delimiter = $delimiter;
        return $this;
    }
    
    public function fileExist($filename)
    {
        if( !file_exists($filename)) {
            return $this->error('No exite el archivo {f}', [
                'f'=>$filename
            ]); 
        }
        
        return true;
    }
    
    public function read($filename)
    {
        $handle = fopen($filename, 'r');
        $data = [];
        $header = NULL;
        
        if ( $handle === FALSE) {
            return $this->error('Imposible leer el archivo {f}', [
                'f'=>$filename
            ]);
        }
        
        while (($row = fgetcsv($handle, 0, $this->delimiter)) !== FALSE) {
            if(!$header) {
                $header = $row;
            } else {
                $data [] = json_decode(json_encode(array_combine($header, $row)));                
            }
        }
        fclose($handle);
        return $data;
    }
    
}
