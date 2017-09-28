<?php



Route::group(['middleware' => 'auth'], function () {
    //  --------------------- Route: List, add or edit superheroes ------------- //
    Route::group(['prefix' => 'hero'], function () {
        Route::get('/list/{isActive}/{hero_id?}/{isActiveAddress?}', 'HeroesController@index');
        Route::post('/add', 'HeroesController@addNewHero');
        Route::put('/update/{hero_id}/', 'HeroesController@editHero'); 
    });

    Route::group(['prefix' => 'power'], function () {
    // --------------- Route: List, add or edit superpower ------------------------//
        Route::get('/list/{power_id?}', 'PowerController@index');
        Route::post('/new', 'PowerController@newPower');
        Route::put('/edit/{power_id}', 'PowerController@editPower');

    // ---------- Route: List, add or edit superpower assignment to superheroes -------- //
        Route::get('/list/byhero/{hero_id}', 'PowerController@listByHero');
        Route::get('/list/bypower/{power_id}', 'PowerController@listByPower');
        Route::get('/list/bylv/{power_level}', 'PowerController@listByPowerLv');
        Route::post('/attach/{power_id}/{hero_id}', 'PowerController@assignPowerToHero');
        Route::put('/detach/{power_id}/{hero_id}', 'PowerController@removePowerFromHero');
    });
        
    // ---------------- Route: View, Assign or delete address to hero -------------- //
    Route::group(['prefix' => 'address'], function () {
        Route::post('address/new/{hero_id}', 'AddressController@newAddress');
        Route::post('address/delete/{hero_id}/{address_name}', 'AddressController@updateActiveAddress');
    });

    // ------------------- Route: Add/edit/remove City/Country ------------------- //
    Route::group(['prefix' => 'location'], function () {
        Route::post('/country/new', 'LocationController@newCountry');
        Route::put('/country/update/{country_id}', 'LocationController@updateCountry'); 
        Route::post('/city/new/{country_id}', 'LocationController@newCity');
        Route::put('/city/update/{city_id}', 'LocationController@updateCity');
    });

    // ------------------- Route: Get/Add Status and Gender --------------- //
    Route::group(['prefix' => 'info'], function() {
        Route::get('/status', 'InformationController@getStatus');
        Route::post('/status/new', 'InformationController@newStatus');
        Route::get('/gender', 'InformationController@getGender');
        Route::post('/gender/new', 'InformationController@newGender');
    });
});


?>

