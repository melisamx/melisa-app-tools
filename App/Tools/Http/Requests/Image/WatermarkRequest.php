<?php

namespace App\Tools\Http\Requests\Image;

use Melisa\Laravel\Http\Requests\Generic;
use Melisa\Sanitizes\BeforeSanitize;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class WatermarkRequest extends Generic
{
    use BeforeSanitize;
    
    protected $rules = [
        'source'=>'required|string',
        'watermark'=>'required|string',
        'position'=>'required|xss|string|in:top-left,top,top-right,left,center,right,bottom-left,bottom,bottom-right',
        'x'=>'sometimes|xss|integer',
        'y'=>'sometimes|xss|integer',
        'suffix'=>'sometimes|xss|string',
        'overwrite'=>'sometimes|xss|boolean',
        'generateNewFile'=>'sometimes|xss|boolean',
    ];
    
    protected $sanitizes = [
        'overwrite'=>'boolean',
        'generateNewFile'=>'boolean',
    ];
    
}
