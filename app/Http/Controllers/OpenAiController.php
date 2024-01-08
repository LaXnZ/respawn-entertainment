<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class OpenAIController extends Controller
{
    public function index(){

         return view('user.chat', [
            'message' => 'Welcome to the chatbot!'
        ]);
    }

    public function getResponse(Request $request){

        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
        
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $request->get('message')
                ],
            ],
        ]);

       
        return view('user.chat', [
            'message' => $result->choices[0]->message->content
        ]);
    }


}