<?php

namespace App\Tools\Logics\Image;

use Intervention\Image\ImageManagerStatic as Image;
use Melisa\core\LogicBusiness;

/* 
 * Resize image
 */
class ResizeLogic
{
    use LogicBusiness;
    
    protected $imageManager;
    protected $eventSuccess = 'tools.image.resize.success';

    public function __construct(Image $imageManager)
    {
        $this->imageManager = $imageManager;
    }
    
    public function init(array $input)
    {        
        $input = $this->inputDefault($input);
        
        $newFile = $this->getPathFile($input);
        
        if( $this->existFile($newFile) && !$input['overwrite']) {
            
            $this->debug('File {f} exist but not overwrite', [
                'f'=>$newFile
            ]);
            return $newFile;
            
        }
        
        $image = $this->imageManager->make($input['pathFile'])
                ->resize($input['width'], $input['height']);
        
        $image->save($newFile);
        
        $event = [
            'pathFile'=>$newFile,
            'width'=>$input['width'],
            'height'=>$input['height'],
        ];
        
        if( !$this->fireEvent($event)) {
            return false;
        }
        
        return $newFile;        
    }
    
    public function fireEvent(array &$event)
    {
        if( !$this->emitEvent($this->eventSuccess, $event)) {
            return false;
        }
        return true;
    }
    
    public function inputDefault(&$input)
    {
        return melisa('array')->mergeDefault($input, [
            'quality'=>null,
            'generateNewFile'=>true,
            'suffixSize'=>true,
            'overwrite'=>false,
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
        $pathInfo = pathinfo($input['pathFile']);
        
        if( !$input['generateNewFile']) {
            return $input['pathFile'];
        }        
        if( !$input['suffixSize']) {
            return $input['pathFile'];
        }        
        return $pathInfo['dirname'] . '/' . 
                $pathInfo['filename'] . '-' .
                $input['width'] . 'x' . 
                $input['height'] . '.' .
                $pathInfo['extension'];        
    }
    
}
