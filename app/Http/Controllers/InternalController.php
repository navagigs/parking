<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Identitas;

class InternalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $identitas          = Identitas::find(1);

        return view('admin.home', compact('identitas'));
    }
}
