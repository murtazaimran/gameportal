<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Hash;



class LoginController extends Controller
{

	 // public function __construct()
  //   {
  //       $this->middleware('guest')->except('logout');
  //   }
    


    public function show_login_form()
    {
        return view('login');
    }


    public function process_login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->except(['_token']);

        $user = User::where('email',$request->email)->first();

        if (auth()->attempt($credentials)) {

            return redirect()->route('dashboard'); 
            // return redirect()->intended('home');
        }else{ 

        	//die(Hash::make($request->password));
            session()->flash('message', 'Invalid credentials');
            return redirect()->back()->with('error', 'Oppes! You have entered invalid credentials');
        }
    }
    public function show_signup_form()
    {
        return view('backend.register');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function process_signup(Request $request)
    {   
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
 
        $user = User::create([
            'name' => trim($request->input('name')),
            'email' => strtolower($request->input('email')),
            'password' => bcrypt($request->input('password')),
        ]);

        session()->flash('message', 'Your account is created');
       
        return redirect()->route('login');
    }
    public function logout()
    {
        \Auth::logout();

        return redirect()->route('login');
    }

    //  public function home()
    // {

    //   return view('admin.dashboard');
    // }
}
