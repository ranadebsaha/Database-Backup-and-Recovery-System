<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Session;
use Storage;
use Artisan;
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
   public function view_login(){
    return view('login');
   }
   public function login(Request $request){
    $validated = $request->validate([
        "admin_id" => "required",
        "password" => "required"
    ]);
    $admin = Admin::where('admin_id', '=', $request->admin_id)->first();
    if ($admin) {
        if (($request->password) === ($admin->password)) {
            $request->session()->put('admin_id', $admin->admin_id);
            return redirect('dashboard')->with('success', "Welcome");
        } else {
            return redirect('login')->with('error', "Enter Valid Password");
        }
    } else {
        return redirect('login')->with('error', "Enter a Valid Admin Id");
    }
   }
   public function view_dashboard(){
    if (Session::has('admin_id')) {
    $users = User::all();
    $data=compact('users');
    return view('dashboard')->with($data);
    }else{
        return redirect('login');
    }
   }
   public function logout(){
    if (Session::has('admin_id')) {
        Session::pull('admin_id');
        return redirect('login');
    }
    else{
        return redirect()->back();
    }
}
public function delete($id){
    if (Session::has('admin_id')) {
        $user = User::find($id);
        if(!is_null($user)){
            $user->delete();
            return redirect('dashboard')->with('success',"Deleted Successfully Completed");
        }else{
            return redirect('dashboard')->with('error',"Something Wrong");
        }
    }else{
        return redirect('login')->with('error',"Please Login First");
    }
   }

   public function backup(){
    if (Session::has('admin_id')) {
        $table='users';
        $backupfile=storage_path('app/backup.sql');
        $command=sprintf('mysqldump --user=%s --password=%s --host=%s %s %s > %s',env('DB_USERNAME'),env('DB_PASSWORD'),env('DB_HOST'),env('DB_DATABASE'),$table,$backupfile);
        exec($command);
        return redirect('dashboard')->with('success',"Backup Completed");
    }else{
        return redirect('login');
    }
   }

   public function restore(){
    if (Session::has('admin_id')) {
    $filepath=storage_path('app/backup.sql');
    $command=sprintf('mysql -u%s -p%s %s < %s',env('DB_USERNAME'),env('DB_PASSWORD'),env('DB_DATABASE'),$filepath);
    exec($command);
    return redirect('dashboard')->with('success',"Restore Completed");
    }else{
        return redirect('login');
    }
   }
}
