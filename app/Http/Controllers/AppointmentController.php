<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\BusinessHour;
use App\Services\AppointmentService;
use Carbon\CarbonPeriod;
use App\Http\Requests\AppointmentRequest;

class AppointmentController extends Controller
{
    public function index()
    {
        $datePeriod = CarbonPeriod::create(now(), now()->addDays(6));

        $appointments = [];

        foreach($datePeriod as $date){
            $appointments [] = (new AppointmentService)->generateTimeData($date);
        }

        return view('appointments.reserve', compact('appointments'));
    }

    public function reserve(AppointmentRequest $request)
    {

        $data = $request->merge(['user_id'=>auth()->id()])->toArray();

        Appointment::create($data);

        return redirect()->route('appointments.reserve')->with('success', 'Successfully reserved the appointment.');

    }
}