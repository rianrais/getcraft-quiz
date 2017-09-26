<?php


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    
    // Hero - There's no delete because you can just update the status of a hero
    Route::get('/hero/{hero_id?}', 'HeroesController@index');    
    Route::post('/hero', 'HeroesController@addNewHero');
    Route::put('/hero/update/{hero_id}/', 'HeroesController@editHero'); 

    // Power
    Route::post('/power/new', 'PowerController@addNewPower');
    Route::put('/power/edit/{power_id}', 'PowerController@editPower');
    Route::get('/power/{power_id?}/{hero_id?}', 'PowerController@index');

    // Assign new power to hero or update the power on a hero to be inactive
    Route::post('/power/assign/new/{hero_id}', 'PowerAssignmentController@newPower');
    Route::put('/power/assign/update/{hero_id}/{power_id}', 'PowerAssignmentController@updatePower');

    // Assign Address
    Route::post('address/new/{hero_id}', 'AddressAssignmentController@newAddress');
    Route::delete('address/delete/{hero_id}/{address_name}', 'AddressAssignmentController@deleteAddress');

    // Country
    Route::post('/country/new', 'LocationController@newCountry');
    Route::put('/country/update/{country_id}', 'LocationController@updateCountry');
    Route::delete('/country/delete/{country_id}', 'LocationController@deleteCountry'); 

    // City
    Route::post('/city/new', 'LocationController@newCity');
    Route::put('/city/update/{city_id}', 'LocationController@updateCity');
    Route::delete('city/delete/{city_id}', 'LocationController@deleteCity'); 

});

?>

