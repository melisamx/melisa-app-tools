<?php

namespace App\Tools\Http\Controllers;

use Melisa\Laravel\Http\Controllers\Controller;

/**
 * 
 *
 * @author Luis Josafat Heredia Contreras
 */
class BarcodesController extends Controller
{
    
    public function render1d($code = 'Melisa Tools', $type = 'C128')
    {        
        $barcode = new \TCPDFBarcode($code, $type);
        
        /* necesary or not display image */
        exit($barcode->getBarcodePNG(2, 35));        
    }
    
    /**
     * 
     * @param type $code
     * @param type $type necesay ,1,0 fix error
     */
    public function render2d($code = 'Melisa Tools', $type = 'PDF417,1,0')
    {        
        $barcode = new \TCPDF2DBarcode($code, $type);        
        /* necesary or not display image */
        exit($barcode->getBarcodePNG(2, 1));        
    }
    
}
