<?php

//  Route: List, add or edit superheroes
Route::group(['prefix' => 'hero', 'middleware' => 'auth'], function () {
    Route::get('/list/{hero_id?}', 'HeroesController@index');
    Route::post('/add', 'HeroesController@addNewHero');
    Route::put('/update/{hero_id}/', 'HeroesController@editHero'); 
});

Route::group(['prefix' => 'power', 'middleware' => 'auth'], function () {
    //   Route: List, add or edit superpower
    Route::get('/list/all', 'PowerController@index');
    Route::post('/new', 'PowerController@addNewPower');
    Route::put('/edit/{power_id}', 'PowerController@editPower');

    //  Route: List, add or edit superpower assignment to heroes
    Route::get('/list/{hero_id}', 'PowerController@listByHero');
    Route::get('/list/{power_id}', 'PowerController@listByPower');
    Route::post('/assign/new/{power_id}/{hero_id}', 'PowerController@assignPowerToHero');
    Route::put('/assign/update/{hero_id}/{power_id}', 'PowerController@updatePowerToHero');
});
    
// Route: Assign or delete address to hero
Route::group(['prefix' => 'address', 'middleware' => 'auth'], function () {
    Route::post('address/new/{hero_id}', 'AddressController@addNewAddress');
    Route::delete('address/delete/{hero_id}/{address_name}', 'AddressController@deleteAddress');
});

//  Route: Add/edit/remove locations
Route::group(['prefix' => 'location', 'middleware' => 'auth'], function () {

    Route::post('/country/new', 'LocationController@newCountry');
    Route::put('/country/update/{country_id}', 'LocationController@updateCountry');
    Route::delete('/country/delete/{country_id}', 'LocationController@deleteCountry'); 

    Route::post('/city/new', 'LocationController@newCity');
    Route::put('/city/update/{city_id}', 'LocationController@updateCity');
    Route::delete('city/delete/{city_id}', 'LocationController@deleteCity'); 
});

?>

