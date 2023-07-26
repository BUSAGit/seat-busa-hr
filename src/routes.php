<?php

Route::group([
    
    'namespace' => 'Helious\SeatBusaHr\Http\Controllers\Character',
    'prefix' => 'characters',
    'middleware' => [
        'web',
        'auth',
    ],
], function()
{

    Route::get('/{character}/notes', [
        'uses' => 'HrController@notes',
        'as' => 'seat-busa-hr::notes',
        'middleware' => 'can:seat-busa-hr.access,character',
    ]);

});