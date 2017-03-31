<?php 

Route::group([
    'prefix'=>'v1',
    'middleware'=>'auth.basic',
    'namespace' =>'v1'
], function() {
    
    Route::group([
        'prefix'=>'image'
    ], function() {

        require realpath(base_path() . '/routes/modules/image.php');

    });
    
});
