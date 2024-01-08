<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Requests\AppointmentRequest;
use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

it('can generate time data for appointments', function () {
    $controller = new AppointmentController();
    $date = Carbon::now();

    $result = $controller->generateTimeData($date);

    expect($result)->toHaveKeys(['date', 'timeslots']);
    expect($result['date'])->toBe($date->format('Y-m-d'));
    expect($result['timeslots'])->toBeArray();
});

it('can reserve an appointment', function () {
    $this->withoutExceptionHandling();
    $controller = new AppointmentController();
    $request = AppointmentRequest::create('/appointments/reserve', 'POST', [
        'user_id' => 1,
        // Add other required fields here
    ]);

    $response = $controller->reserve($request);

    expect($response)->toHaveStatus(302);
    expect($response)->toHaveSession('success');
    expect(Appointment::count())->toBe(1);
});

it('can retrieve reservations for the authenticated user', function () {
    $controller = new AppointmentController();
    $user = User::factory()->create(); // Import the factory method
    $this->actingAs($user);

    $response = $controller->myReservations();

    expect($response)->toHaveView('appointments.my-reservations');
    expect($response['reservations'])->toBeInstanceOf(\Illuminate\Pagination\LengthAwarePaginator::class);
});

it('can retrieve reservations for a specific user (admin view)', function () {
    $controller = new AppointmentController();
    $request = new Request(['user' => 1]);

    $response = $controller->adminReservationsView($request);

    expect($response)->toHaveView('admin.reservations.reservation');
    expect($response['reservations'])->toBeInstanceOf(\Illuminate\Pagination\LengthAwarePaginator::class);
    expect($response['users'])->toBeInstanceOf(\Illuminate\Database\Eloquent\Collection::class);
});