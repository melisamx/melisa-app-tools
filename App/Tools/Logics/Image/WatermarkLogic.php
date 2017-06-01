<?php

namespace App\Tools\Logics\Image;

use Intervention\Image\ImageManagerStatic as Image;
use Melisa\core\LogicBusiness;

/* 
 * Resize image
 */
class WatermarkLogic
{
    use LogicBusiness;
    
    protected $imageManager;
    protected $eventSuccess = 'tools.image.watermark.success';

    public function __construct(Image $imageManager)
    {
        $this->imageManager = $imageManager;
    }
    
    public function init(array $input)
    {        
        $this->debug('Init logic watermark {d}', [
            'd'=>json_encode($input)
        ]);
        
        $input = $this->inputDefault($input);
        
        $newFile = $this->getPathFile($input);
        
        if( $this->existFile($newFile) && !$input['overwrite']) {
            
            $this->debug('File {f} exist but not overwrite', [
                'f'=>$newFile
            ]);
            return $newFile;
            
        }
        
        $image = $this->imageManager->make($input['source'])
                ->insert($input['watermark'], $input['position'], $input['x'], $input['y']);
        
        $image->save($newFile);
        
        $event = $input;
        $event ['source']= $newFile;
        
        if( !$this->emitEvent($this->eventSuccess, $event)) {
            return false;
        }
        
        return $newFile;        
    }
    
    public function inputDefault(&$input)
    {
        return melisa('array')->mergeDefault($input, [
            'x'=>null,
            'y'=>null,
            'overwrite'=>false,
            'generateNewFile'=>true,
            'suffix'=>null,
        ]);
    }
    
    public function existFile($pathFile)
    {        
        if( file_exists($pathFile)) {
            return true;
        }
        
        return false;        
    }
    
    public function getPathFile(array &$input)
    {        
        $pathInfo = pathinfo($input['source']);
        
        if( !$input['generateNewFile']) {
            return $input['source'];
        }
        
        if( !$input['suffix']) {
            return $input['source'];
        }
        
        return $pathInfo['dirname'] . '/' . 
                $pathInfo['filename'] . 
                $input['suffix'] . '.' .
                $pathInfo['extension'];        
    }
    
}
