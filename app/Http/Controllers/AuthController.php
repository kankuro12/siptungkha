<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function dashboard(){
        return view('back.index');
    }
     public function login(Request $request){
        if($request->getMethod()=="POST"){

            $request->validate([
                'email' => 'required',
                'password' => 'required|string',

            ]);
            $email=$request->email;
            $password=$request->password;
            if (Auth::attempt(['email' => $email, 'password' => $password], true)) {
                    return redirect()->route(Auth::user()->getRole().'.dashboard');
            }else{
                return redirect()->back()->withErrors('Credential do not match');
            }
        }else{
            return view('back.adminlogin');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    public function changePass(Request $request){
        // dd($request->all());
        $user = User::where('id',Auth::user()->id)->first();
        // dd($user->password);
        if(Hash::check($request->oldpass, $user->password)){
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->back()->with('success','Password chanage successfully !');
        }else{
            return redirect()->back()->with('warning','Old password does not match !');
        }
    }

    public function message(){
        $messages = Message::latest()->get();
        return view('back.message',compact('messages'));
    }

    public function userList(){
        $user = User::where('id','!=',5)->get();
        return view('back.user.list',compact('user'));
    }

    public function newUserStore(Request $request){
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 0;
        $user->save();
        return redirect()->back()->with('success','User added successfully !');
    }

    public function userDelete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success','User deleted successfully !');
    }
}
