<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Models\Superhero;
use Models\Gender;
use Models\Status;

class HeroesController extends Controller 
{
    public function index($isActive, $hero_id)
    {
        
        // Checking for optional Hero ID input
        if($hero_id) {
            $hero = Superhero::with(['status.status', 'gender.gender'])
            ->where('id', $hero_id)
            ->where('isActive', $isActive)
            ->firstOrFail();
            
            // Checking for optional isActiveAddress input
            if($isActiveAddress) {
                $address = HeroAddress::where('hero_id', $hero_id)
                ->where('isActive', $isActiveAddress)
                ->get();
            } else {
                $address = HeroAddress::where('hero_id', $hero_id)
                ->get();
            }

            return response()->json(['hero' => $hero, 'address' => $address], 200);
        } else {
            $hero = Superhero::with(['status.status', 'gender.gender'])
            ->where('isActive', $isActive)->paginate(20);

            return response()->json(compact($hero), 200);
        }
    }

    public function addNewHero(Request $request) 
    {
        $this->validate($request, [
            'first_name' => 'required',
            'alter_ego' => 'required',
            'gender_id' => 'required'
        ]);

        $hero = new Superhero;
        $hero->first_name = $request->input('first_name');
        $hero->alter_ego = $request->input('alter_ego');
        $hero->gender_id = $request->input('gender_id');
        $hero->status = $request->input('status_id');
        
        //  Since not all heroes have a first and a last name.
        if($request->filled('last_name')) {
            $hero->last_name = $request->input('last_name');
        }

        $hero->save();        
    }

    public function editHero(Request $request, $hero_id)
    {
        $hero = Superhero::find('id', $hero_id)->firstOrFail();

        $hero->first_name = $request->input('first_name');
        $hero->last_name = $request->input('last_name');
        $hero->alter_ego = $request->input('alter_ego');
        $hero->gender = $request->input('gender_id');
        $hero->status = $request->input('status_id');
        $hero->save();
    }
}