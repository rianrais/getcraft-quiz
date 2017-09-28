<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Models\Power;

class PowerController extends Controller 
{
    /***********************************************
     *
     *  This will be Controller that is functioned to
     *  list/add/edit all the power in the database.
     *  
     ***********************************************/
    public function index($power_id)
    {
        if($power_id) {
            $power = Power::findOrFail($power_id);

            return response()->json(compact($power), 200);
        } else {
            $power = Power::get()->paginate(20);

            return response()->json(compact($power), 200);
        }
    }

    public function newPower(Request $request) 
    {
        $this->validate($request, [
            'power' => 'required',
            'description' => 'required',
            'powerLv' => 'required|integer|between:1,10',
        ]);

        $power = new Power;
        $power->power = $request->input('power');
        $power->description = $request->input('description');
        $power->PowerLv = $request->input('powerLv');
        $power->save();
    }

    public function editPower(Request $request, $power_id)
    {
        $power = Power::where('id', $power_id)->get();
        $power->power = $request->input('power');
        $power->description = $request->input('description');
        $power->PowerLv = $request->input('powerLv');
        $power->save(); 
    }

    /***********************************************
     *
     *  This will be Controller that is functioned for 
     *  Superheroes_Powers table using Many To Many
     *  Relationship in Laravel.
     *  
     ***********************************************/
    
    public function listByHero($hero_id)
    {
        $list = Superhero::with('power:description,PowerLv')
        ->where('id', $hero_id)
        ->get();

        return response()->json(['Hero Power' => $list]);
    }

    public function listByPower($power_id)
    {
        $list = Power::with('Superhero.alter_ego')
        ->where('id', $power_id)
        ->get();

        return response()->json(['power' => $list]);
    }

    public function listByPowerLv($power_level)
    {
        $list = Power::with('Superhero.alter_ego')
        ->where('PowerLv', $power_level)
        ->get();

        return response()->json(['power' => $list]);
    }

    public function assignPowerToHero($power_id, $hero_id)
    {
        $power = Power::find($power_id);
        $power->superhero()->attach($hero_id);
    }

    public function removePowerFromHero($hero_id, $power_id)
    {
        $power = Power::find($power_id);
        $power->superhero()->detach($hero_id);
    }
}