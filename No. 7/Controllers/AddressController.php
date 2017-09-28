<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Models\HeroAddress;

class AddressController extends Controller 
{
    public function newAddress(Request $request)
    {
        $this->validate($request, [
            'address' => 'required',
            'superhero_id' => 'required|integer',
            'city_id' => 'required|integer',
        ]);
        
        $address = new HeroAddress;
        $address->address = $request->input('address');
        $address->superhero_id = $request->input('superhero_id');
        $address->city_id = $request->input('city_id');
        $address->save();
    }

    public function updateActiveAddress(Request $request, $address_name, $hero_id)
    {
        $address = HeroAddress::where('address', $address_name)
        ->where('superhero_id', $hero_id)
        ->firstOrFail();

        $address->isActive = $request->input('isActive');
        $address->save();
    }
}