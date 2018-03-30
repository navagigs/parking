<?php

namespace App\Http\Controllers\Auth;

use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Models\Identitas;

class MemberLoginController extends Controller
{
    public function __construct() 
    {
        $this->middleware('guest:member', ['except' => ['logout']]);
    }
    
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::guard('member')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('member.dashboard'));
        }
        Session::flash('error', 'Email atau Password salah');
        return redirect()->route('website.home');
        
    }

    public function logout()
    {
        Auth::guard('member')->logout();
        // return 'telah keluar member';
        return redirect('/');
    }
} 
