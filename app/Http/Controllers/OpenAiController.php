<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class OpenAIController extends Controller
{
    public function index()
    {

        return view('user.chat', [
            'message' => 'Welcome to the chatbot!'
        ]);
    }

    public function getResponse(Request $request)
    {
        $products = (new \App\Models\Product())->pluck('name')->toArray();
        $category = (new \App\Models\Category())->pluck('name')->toArray();
        $games = (new \App\Models\Game())->pluck('name')->toArray();
        $genres = (new \App\Models\Game())->pluck('genre')->toArray();
        $gamePlatforms = (new \App\Models\Game())->pluck('platform')->toArray();
        $reservations = (new \App\Models\Appointment())->pluck('date', 'time')->toArray();
        $workingHours = (new \App\Models\BusinessHour())->pluck('day', 'from', 'to')->toArray();

        $question = $request->get('message') ?? 'What can you do for me?';

        $prompt = '
    Below is a description about a gaming shop called respawn entertainment. It also has a gaming cafe in a separate location. The gaming shop sells gaming products and games, and the cafe provides gaming services. 

    Following are the products and games the shop has:

    - ' . implode(' - ', $products) . '

    The available categories for products are:

    - ' . implode(' - ', $category) . '

    The available games are:

    - ' . implode(' - ', $games) . '

    The available genres for games are:

    - ' . implode(' - ', $genres) . '

    The available game platforms are:

    - ' . implode(' - ', $gamePlatforms) . '

    The reservations booked are:

    - ' . implode(' - ', array_map(function ($date, $time) {
            return $date . ' at ' . $time;
        }, array_keys($reservations), $reservations)) . '

    The working hours are:

    - ' . implode(' - ', array_map(function ($day, $from, $to) {
            return $day . ' from ' . $from . ' to ' . $to;
        }, array_keys($workingHours), $workingHours, $workingHours)) . '

    Based on the above information, answer as a customer support assistant.
    Q:' . $question;

        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'assistant',
                    'content' => $prompt
                ],
            ],
        ]);

        $message = $result->choices[0]->message->content;

        return view('user.chat', ['question' => $question, 'message' => $message]);
    }
}