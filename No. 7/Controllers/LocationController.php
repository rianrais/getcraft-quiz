<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Models\Power;
use Models\Superhero;

class LocationController extends Controller 
{
    public function newCountry(Request $request) 
    {
        $this->validate($request, [
            'country' => 'required',
        ]);

        $country = new Country;
        $country->name = $request->input('country');
        $country->Save();
    }

    public function updateCountry($country_id, Request $request)
    {
        $country = Country::where('id', $country_id)->firstOrFail();
        $country->isExist = $request->input('isExist');
        $country->save();
    }

    public function newCity(Request $request, $country_id)
    {
        $this->validate($request, [
            'city' => 'required'
        ]);

        $country = Country::select('id')->where('id', $country_id)->first();

        $city = new City;
        $city->name = $request->input('city');
        $city->country_id = $country;
        $city->save();
    }

    public function updateCity($city_id, Request $request)
    {
        $city = City::where('id', $country_id)->firstOrFail();

        $country->isExist = $request->input('isExist');
        $country->save();
    }
}