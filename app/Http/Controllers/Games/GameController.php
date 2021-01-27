<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Game;
use View;
use Validator;
use Redirect;

class GameController extends Controller
{
    //
    
    public function getAllGames()
    {
        //sdf
        $games = Game::all();

        return View::make('admin.games.getgames')->with('games', $games);    

    //  return view('admin.user.getusers');
    }

  	public function createGameScreen()
    {
        return view('admin.games.creategame');
    }

    public function createGameChatLogsScreen()
    {
        return view('admin.games.getchatlogdetails');
    }

    public function processCreateGame(Request $request)
    {   

            $validator = Validator::make($request->all(), [
                'game_name' => 'required|string|between:2,100',
                'game_type' => 'required|string'
              ]);

			 if($validator->fails())
			 {
					return Redirect::back()->withErrors($validator);
			 }
			 else
			 {
			 	     $game = Game::create([
			            'game_name' => trim($request->input('game_name')),
			            'game_type' => strtolower($request->input('game_type')),
			            'status' => true,
			        ]);       
			        return redirect()->route('createGame')->with('message', 'Done! Game created');
              }

 
   
    }


}
