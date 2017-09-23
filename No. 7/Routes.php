<?php

/**
 * Unprotected route and will return all heroes (full name, address, ) in the database for the user.
 */
Route::get('/heroes/{filter}', 'HeroesController@index'); // Get all the info including up-to-date powers, known-address, nationality etc - including filters.

/**  
 *  Protected Route to add, delete and update hero by the admin of this Secret Organization (ceritanya).
 *  If user can't access, will return status code 401.
 */
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    
    // Hero - There's no delete because you can just update the status of a hero
    Route::post('/heroes', 'HeroesController@addNewHero');
    Route::put('/heroes/{id}/', 'HeroesController@editHero'); 

    // Power
    Route::post('/power/new', 'PowerController@addNewPower');
    Route::put('/power/description', 'PowerController@editPower');
    Route::get('/power', 'PowerController@index');

    // Assign new power to hero or update the power on a hero to be inactive
    Route::post('/assign/new/{hero_id}', 'PowerAssignmentController@newPower');
    Route::put('/assign/update/{hero_id}/{power_id}', 'PowerAssignmentController@updatePower');

    // Country
    Route::post('/country/new', 'LocationController@newCountry');
    Route::put('/country/update/{id}', 'LocationController@updateCountry');
    Route::delete('/country/delete/{id}', 'LocationController@deleteCountry'); // In case a hero/villain decides to wipe one from existence or.. World War III happened.

    // City
    Route::post('/city/new', 'LocationController@newCity');
    Route::put('/city/update/{id}', 'LocationController@updateCity');
    Route::delete('city/delete/{id}', 'LocationController@deleteCity'); // In case a hero/villain decides to wipe one from existence or.. World War III happened.

});

?>

