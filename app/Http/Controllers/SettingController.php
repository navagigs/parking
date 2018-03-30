<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Models\Identitas;
use App\Models\Admin;

class SettingController extends Controller
{
    public function index()
    {
        $action = 'identitas';
        $identitas = Identitas::find(1);
        return view('admin.setting', compact('action','identitas'));
    }

    public function update_identitas(Request $request, $id)
    {
        $identitas = Identitas::find($id);
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'keyword' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'facebook' => 'required',
            'email' => 'required|email',
            'twitter' => 'required',
            'googleplus' => 'required',
            'youtube' => 'required',
            'location' => 'required',
        ]);

        $identitas->name = $request->name;
        $identitas->description = $request->description;
        $identitas->keyword  = $request->keyword;
        $identitas->address = $request->address;
        $identitas->phone  = $request->phone;
        $identitas->facebook = $request->facebook;
        $identitas->email = $request->email;
        $identitas->twitter = $request->twitter;
        $identitas->googleplus = $request->googleplus;
        $identitas->youtube = $request->youtube;
        $identitas->location = $request->location;
        if($request->file('favicon') != null) {
          File::delete(public_path('/public/upload/setting/'.$identitas->favicon)); 
          $extention_favicon = Input::file('favicon')->getClientOriginalExtension();
          $favicon = 'favicon-'.rand(11111,99999).'.'. $extention_favicon;
          $request->file('favicon')->move(
            base_path() . '/public/upload/setting/', $favicon
        );
          $identitas->favicon = asset('/upload/setting/'.$favicon);
      }
      $identitas->save();
      Session::flash('success', 'Telah berhasil mengedit data identitas');
      return  redirect()->route('internal.setting');
  }


    public function profile()
    {
        $action = 'profile';
        $identitas = Identitas::find(1);
        $email = Auth::user()->email;
        $profile = Admin::where('email', '=', 'admin@admin.com')->first();
        return view('admin.setting', compact('action','identitas','profile'));
    }

     public function update_profile(Request $request, $id)
    {
        $profile = Admin::find($id);
        $this->validate($request, [
            'name' => 'required',
        ]);
        $profile->name = $request->name;
        if ($request->input('password') != null) {
            $profile->password = bcrypt($request->input('password'));
        }
      $profile->save();
      Session::flash('success', 'Telah berhasil mengedit data profile');
      return  redirect()->route('internal.setting.profile'); 
  }

}
