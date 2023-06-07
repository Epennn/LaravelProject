<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function viewLogin() {
        return view('login');
    }

    public function viewRegister() {
        return view('register');
    }

    public function viewEditPassword() {
        return view('editPassword');
    }

    public function login(Request $request) {
        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $validation = [
            'email' => 'required',
            'password' => 'required | min:5 | max:20'
        ];

        $validator = Validator::make($request->all(), $validation);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        if(Auth::viaRemember()) {
            if(Auth::user()->role == 'member') {
                return redirect()->to('/userHome');
            } else {
                return redirect()->to('/adminHome');
            }
        }
        else if(Auth::attempt($credential, $request->remember)) {
            if(Auth::user()->role == 'member') {
                return redirect()->to('/userHome');
            } else {
                return redirect()->to('/adminHome');
            }
        }

        return back()->withErrors(['error' => 'Email or Password did not Match!']);
    }

    public function register(Request $request) {
        $validation = [
            'username' => 'required | min:5 | max:20',
            'email' => 'required',
            'password' => 'required | min:5 | max:20',
            'phone' => 'required | min:10 | max:13',
            'address' => 'required | min:5'
        ];

        $validator = Validator::make($request->all(), $validation);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        return redirect()->to('/login');
    }

    public function editPassword(Request $request) {
        $user = User::where('email', Auth::user()->email)->first();

        $validation = [
            'oldPassword' => 'required',
            'newPassword' => 'required | min:5 | max: 20'
        ];

        $validator = Validator::make($request->all(), $validation);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        if(!Hash::check($request->oldPassword, $user->password)) {
            return back()->withErrors('Input the Correct Old Password');
        }

        $user->password = bcrypt($request->newPassword);
        $user->update();

        if($user->role == "member") {
            return redirect()->to('/profile');
        } else {
            return redirect()->to('/adminProfile');
        }
    }

    public function logout() {
        Auth::logout();

        return redirect('/');
    }
}
