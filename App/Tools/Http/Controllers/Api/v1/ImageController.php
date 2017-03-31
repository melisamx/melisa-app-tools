<?php namespace App\Tools\Http\Controllers\Api\v1;

use Melisa\Laravel\Http\Controllers\Controller;
use App\Tools\Http\Requests\Image\ResizeRequest;
use App\Tools\Logics\Image\ResizeLogic;

class ImageController extends Controller
{
    
    public function resize(ResizeRequest $request, ResizeLogic $logic)
    {
        
        $output = $logic->init($request->allValid());
        
        return response()->create($output);
        
    }
    
}
