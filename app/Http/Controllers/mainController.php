<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class mainController extends Controller
{
   public function view_form(){
    return view('index');
   }
   public function save_form(Request $request){
    $request->validate([
        "name" => 'required',
        "email" => "required|email|unique:users",
        "address" => "required",
        "city" => "required",
        "zipcode" => "required",
        "checkbox"=> "accepted"
    ]);
    $user = new User;
    $user->name = $request['name'];
    $user->email = $request['email'];
    $user->address = $request['address'];
    $user->city = $request['city'];
    $user->zipcode = $request['zipcode'];
    $res = $user->save();
    if ($res) {
        return redirect('/list')->with('success', 'Registered Successfully Completed');
    } else {
        return redirect('/')->with('error', "Something Wrong");
    }
   }
   public function view_list(){
    $users = User::all();
    $data=compact('users');
    return view('list')->with($data);
   }
}
