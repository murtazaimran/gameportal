<?php

namespace App\Http\Controllers\Messages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Message;
use View;
use Validator;
use Redirect;

class MessageController extends Controller
{
    //


     public function getMessagesByGameId($id)
    {
    
    $message = Message::where('game_id', $id)
                    ->get();

		return response()->json([
            'error' => false,
            'message' => 'Success',
            'data' => $message
        ], 200);
        //return View::make('admin.games.getgames')->with('games', $games);    

    //  return view('admin.user.getusers');
    }

}
