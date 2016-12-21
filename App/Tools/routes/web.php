<?php 

Route::get('barcodes/render1d/{code?}', 'BarcodesController@render1d');
Route::get('barcodes/render2d/{code?}', 'BarcodesController@render2d');
