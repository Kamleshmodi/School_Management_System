<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Mail;
use Str;
use Auth;
use Hash;


class student_management_controller extends Controller
{

    public function login()
    { 
        if(!empty(Auth::check()))
        {
            if(Auth::user()->user_type == 1)
            {
                return redirect('admin/dashboard');
            }
            else if(Auth::user()->user_type == 2)
            {
                return redirect('teacher/dashboard');
            }
            else if(Auth::user()->user_type == 4)
            {
                return redirect('parent/dashboard');
            }
            else if(Auth::user()->user_type == 5)
            {
                return redirect('student/dashboard');
            }
        }
        return view('auth.login');
    }

    public function AuthLogin(Request $request)
    {
        $remember = !empty($request -> remember) ? true : false;

        if(Auth::attempt(['email' => $request -> email, 'password' => $request -> password], true))
        {
            if(Auth::user()->user_type == 1)
            {
                return redirect('admin/dashboard'); 
            }
            else if(Auth::user()->user_type == 2)
            {
                return redirect('teacher/dashboard');
            }
            else if(Auth::user()->user_type == 4)
            {
                return redirect('parent/dashboard');
            }
            else if(Auth::user()->user_type == 5)
            {
                return redirect('student/dashboard');
            }
        }
        else
        {
            return redirect()->back()->with('error','Please Enter currect Email and Password');
        }
    }

    public function forgotpassword()
    {
        return view('auth.forgot');
    }

    public function postforgotpassword(Request $request)
    {
        $user = User::GetEmailSingle($request->email);
        if(!empty($user))
        {
            $user -> remember_token = Str::random(30);
            $user -> save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            //return redirect('/')->with('success','Please check your email and Reset your password');
            return redirect()->back()->with('success','Please check your email and Reset your password');    
        }
        else
        {
            return redirect()->back()->with('error','Please Enter currect Email');
        }
    }
    public function reset($remember_token)
    {
        $user = User::getTokenSingle($remember_token);
        if(!empty($user))
        {
            $data['user'] = $user;
            return view('auth.reset', $data);
        }
        else
        {
            abort(404);
        }
    }
    public function PostReset($token ,Request $request)
    {
        $user = User::getTokenSingle($request->token);
        if(!empty($user))
        {
            $user -> password = Hash::make($request->password);
            $user -> save();
            return redirect('/login')->with('success','Password Reset Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Please Enter currect Token');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(asset(' '));
    }

    public function Website()
    {
        return view('');
    }
}
 