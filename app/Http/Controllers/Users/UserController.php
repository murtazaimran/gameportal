<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Redirect;
use App\Models\User;
use View;
use Validator;


class UserController extends Controller
{
    
   //   public function show($id) {
   //    $users = DB::select('select * from student where id = ?',[$id]);
   //    return view('stud_update',['users'=>$users]);
   // }


    public function createUserScreen()
    {
         return view('admin.user.createuser');
    }

      public function createEditScreen($id)
    {

         $user = User::find($id);
        return view('admin.user.edituser', ['user'=>$user]);
       
    }


       public function getAllUsers()
    {
        //sdf
        $users = User::all();

        return View::make('admin.user.getusers')->with('users', $users);    

      //   return view('admin.user.getusers');
    }



    public function processCreateUser(Request $request)
    {   

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|between:2,100',
                'email' => 'required|string|email|max:100|unique:users',
                'password' => 'required|string|min:6',
              ]);

             if($validator->fails())
             {
                    return Redirect::back()->withErrors($validator);
             }
             else 
             { 
                // print_r($request->request->all());
                // die('ok bhai thek hai ');

                     $user = User::create([
                        'name' => trim($request->input('name')),
                        'email' => strtolower($request->input('email')),
                        'password' => bcrypt($request->input('password')),
                        'phone' => $request->input('phone'),
                        'gender' => $request->input('gender'),
                        'nationality' => $request->input('nationality'),
                        'us_person' => $request->input('us_person'),
                        'dob' => $request->input('dob'),
                        'country' => $request->input('country'),
                        'city' => $request->input('city'),
                        'address' => $request->input('address')
                    ]);       
                    return redirect()->route('getUsers')->with('message', 'Done! User created');
              }

 
   
    }


public function processEditUser(Request $request , $id)
    {   

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|between:2,100'
              ]);

             if($validator->fails())
             {
                    return Redirect::back()->withErrors($validator);
             }
             else 
             { 

                      User::where('id',$id)
                      ->update([
                        'name' => trim($request->input('name')),
                        'phone' => $request->input('phone'),
                        'gender' => $request->input('gender'),
                        'nationality' => $request->input('nationality'),
                        'us_person' => $request->input('us_person'),
                        'dob' => $request->input('dob'),
                        'country' => $request->input('country'),
                        'city' => $request->input('city'),
                        'address' => $request->input('address')
                    ]);       
                    return redirect()->route('getUsers')->with('message', 'Done! User updated');
              }

   
    }


    public function approveUser($id)
    {
         User::where('id',$id)
                      ->update([
                        'id_verified' => 1
                    ]);       
                    return redirect()->route('getUsers')->with('message', 'Done! User approved');
        
    }

     public function deleteUser($id)
    {
        $user = User::where('id',$id);
        $user->delete();
         return redirect()->route('getUsers')->with('message', 'Done! User deleted');
    }

    public function loginApi(Request $request)
    {
         $user= User::where('email', $request->email)->first();
            
                if (!$user || !Hash::check($request->password, $user->password)) {
                    return response([
                        'error' => true,
                        'data' => [],
                        'message' => 'These credentials do not match our records.'
                    ], 404);
                }
            
                 $token = $user->createToken('my-app-token')->plainTextToken;
            
                $response = [
                    'data' => [
                    'user' => $user,
                    'token' => $token
                ],
                'error' => false,
                'message' => 'User logged in successfuly'
            ];
            
                 return response($response, 201);
    }

    public function registerApi(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        if($validator->fails()){
            return response()->json(
            [
                'error' => true,
                'message' => $validator->errors()->toJson(),
                'data' => []
            ], 400);
        }

        $user = User::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password)]
                ));

        return response()->json([
            'error' => false,
            'message' => 'User successfully registered',
            'data' => $user
        ], 201);
    }


    public function getUser()
    {
         $user= auth()->user();


         return response()->json([
            'error' => false,
            'message' => 'User details are',
            'data' => $user
        ], 201);


    }




}
