<?php 

Route::post('resize', 'ImageController@resize')->middleware('gate:task.tools.image.resize');
Route::post('watermark', 'ImageController@watermark')->middleware('gate:task.tools.image.watermark');
