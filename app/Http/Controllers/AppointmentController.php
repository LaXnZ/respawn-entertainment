<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\BusinessHour;
use App\Services\AppointmentService;
use Carbon\CarbonPeriod;
use App\Http\Requests\AppointmentRequest;
use App\Models\User;
use Faker\Provider\UserAgent;
use Illuminate\Http\Resources\Json\PaginatedResourceResponse;

class AppointmentController extends Controller
{
    public function index()
    {
        $datePeriod = CarbonPeriod::create(now(), now()->addDays(6));

        $appointments = [];

        foreach ($datePeriod as $date) {
            $appointments[] = (new AppointmentService)->generateTimeData($date);
        }

        return view('appointments.reserve', compact('appointments'));
    }

    public function reserve(AppointmentRequest $request)
    {

        $data = $request->merge(['user_id' => auth()->id()])->toArray();

        Appointment::create($data);

        return redirect()->route('appointments.reserve')->with('success', 'Successfully reserved the appointment.');
    }

    public function myReservations()
    {
        $reservations = Appointment::where('user_id', auth()->id())->paginate(10);

        return view('appointments.my-reservations', compact('reservations'));
    }

    public function adminReservationsView(Request $request)
    {
        $users = User::all();
    
        // $userName = User::where('id', $request->query('user'))->first()->name;
        
        $selectedUserId = $request->query('user');
       
        
 
        $reservations = Appointment::when($selectedUserId, function ($query, $selectedUserId) {
            return $query->where('user_id', $selectedUserId);
        })->paginate(10);

        return view('admin.reservations.reservation', compact('reservations', 'users'));
    }
}