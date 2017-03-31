<?php namespace App\Tools\Http\Requests\Image;

use Melisa\Laravel\Http\Requests\Generic;
use Melisa\Sanitizes\BeforeSanitize;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class ResizeRequest extends Generic
{
    use BeforeSanitize;
    
    protected $rules = [
        'pathFile'=>'required|string',
        'width'=>'required|xss|integer',
        'height'=>'required|xss|integer',
        'quality'=>'sometimes',
        'generateNewFile'=>'sometimes|xss|boolean',
        'suffixSize'=>'sometimes|xss|boolean',
        'overwrite'=>'sometimes|xss|boolean',
    ];
    
    protected $sanitizes = [
        'suffixSize'=>'boolean',
        'generateNewFile'=>'boolean',
        'overwrite'=>'boolean',
    ];
    
}
