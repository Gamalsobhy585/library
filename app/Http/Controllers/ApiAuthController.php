<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        $data= $request->validate([

            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email|max:255',
            'password'=>'required|string|min:5|max:30|confirmed',
        ]);
        $data['password']=bcrypt($data['password']);
        $data['role_id']=Role::where('name','user')->first()->id;
        // $data['access_token']=bcrypt(Str::random(64));
        $data['access_token']=Str::random(64);
        $user =  User::create($data);
        return \response()->json([
            'access_token'=>$data['access_token'],
            'success_msg'=>'Registered',

        ]);
    //   Auth::login($user);
      return \redirect('/categories');
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
return response()->json([
    'error_msg'=>'credentials not correct',
],422);
}
$accessToken=Str::random(64);
auth()->user()->update([
    'access_token'=>$accessToken,
]);
return response()->json([
    'access_token'=>$data['access_token'],
    'success_msg'=>'Logged in',
]);
    
           }






    public function logout(Request $request)
    {
    $accessToken=$request->header('Access-Token');
    User::where('access_token',$accessToken)->first()->update()([
        'access_token'=>null,
    ]);
    return response()->json([
        'success_msg'=>'Logged out'
    ]);
    }
}
