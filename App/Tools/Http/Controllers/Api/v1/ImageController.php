<?php

namespace App\Tools\Http\Controllers\Api\v1;

use Melisa\Laravel\Http\Controllers\Controller;
use App\Tools\Http\Requests\Image\ResizeRequest;
use App\Tools\Logics\Image\ResizeLogic;
use App\Tools\Http\Requests\Image\WatermarkRequest;
use App\Tools\Logics\Image\WatermarkLogic;

class ImageController extends Controller
{
    
    public function resize(ResizeRequest $request, ResizeLogic $logic)
    {        
        $output = $logic->init($request->allValid());
        return response()->create($output);
    }
    
    public function watermark(WatermarkRequest $request, WatermarkLogic $logic)
    {        
        $output = $logic->init($request->allValid());
        return response()->create($output);
    }
    
}
