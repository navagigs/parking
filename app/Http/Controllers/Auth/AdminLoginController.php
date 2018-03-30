<?php

namespace App\Http\Controllers\Auth;

use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Models\Identitas;

class AdminLoginController extends Controller
{
	public function __construct() 
	{
		$this->middleware('guest:admin', ['except' => ['logout']]);
	}


	public function showLoginForm() 
	{
        $identitas          = Identitas::find(1);
		return view('admin.login', compact('identitas'));
	}

	public function login(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required'
		]);

		if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
			return redirect()->intended(route('internal.dashboard'));
		}
        Session::flash('error', 'Email atau Password salah');
        return redirect()->route('internal.login');
		
	}

	public function logout()
	{
		Auth::guard('admin')->logout();
		// return 'telah keluar admin';
		return redirect('/internal');
	}
} 
