<?php 

Route::post('resize', 'ImageController@resize')->middleware('gate:task.tools.image.resize.create');
