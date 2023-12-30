<?php

namespace App\Http\Controllers;

use App\Models\BusinessHour;
use Illuminate\Http\Request;
use App\Http\Requests\BusinessHoursRequest;


class BusinessHourController extends Controller
{
    public function index()
    {
        $businessHours = BusinessHour::all();
        return view('appointments.businesshours', compact('businessHours'));
    }

    public function update(BusinessHoursRequest $request)
    {

       BusinessHour::query()->upsert($request->validated()['data'],['day']);

       return back();
    }
}