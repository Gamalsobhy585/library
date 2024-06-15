<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data= $request->validate([

            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email|max:255',
            'password'=>'required|string|min:5|max:30|confirmed',
        ]);
        $data['password']=bcrypt($data['password']);
        $data['role_id']=Role::where('name','user')->first()->id;
      $user =  User::create($data);
      Auth::login($user);
      return \redirect('/categories');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
   public function login(Request $request)
    {
        $data= $request->validate([
            'email'=>'required|email|max:255',
            'password'=>'required|string|min:5|max:30',

        ]);
        // Auth::login($user);
        $isLogin =    Auth::attempt(['email'=>$data['email'],'password'=>$data['password']]);
        if(! $isLogin){
            return back()->withErrors('credentails not correct');

        }
        return redirect (url('categories'));
        return \redirect('/categories');
    }
    public function logout()
    {
    Auth::logout();
    redirect(url('login'));
    }
}
