<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Models\Gender;
use Models\Status;

class InformationController extends Controller 
{
    public function getStatus()
    {
        $statuses = Status::get();

        return response()->json(['status' => $statuses], 200);
    }

    public function newStatus(Request $request)
    {
        $status = new Status;

        $status->status = $request->input('status');
        $status->save();
    }

    public function getGender()
    {
        $genders = Gender::get();

        return respones()->json(['gender' => $genders], 200);
    }

    public function newGender(Request $request)
    {
        $gender = new Gender;

        $gender->gender = $request->input('gender');
        $gender->save();
    }
}