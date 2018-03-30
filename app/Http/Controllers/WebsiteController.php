<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Identitas;
use App\Models\Media;
use App\Models\Category;
use App\Models\Partner;
use App\Models\City;
use App\Models\Floor;
use App\Models\Booking_history;
use DB;
use Auth;

class WebsiteController extends Controller
{
    public function index()
    {
        $identitas   = Identitas::find(1);
        $media       = Media::where('status','=','active')->where('type','=','slider')->get();
        $content     = Media::where('status','=','active')->where('type','=','content')->first();
        $category    = Category::where('type','=','partner')->where('status','=','active')->get();
        $partner     = Partner::where('status','=','active')->get();
        return view('website.home', compact('identitas','media','content','category','partner'));
    }


    public function location()
    {
        $action      = 'view';
        $identitas   = Identitas::find(1);
        $content     = Media::where('status','=','active')->where('type','=','content')->first();
        $category    = Category::where('type','=','partner')->where('status','=','active')->get();
        $partner     = Partner::orderBy('id', 'DESC')->where('status','=','active')->paginate(6);
        $partner_location     = Partner::orderBy('id', 'DESC')->where('status','=','active')->get();
        $partner_count= Partner::count();
        return view('website.location', compact('action','identitas','media','content','category','partner','partner_location'));
    }

    public function location_detail(Request $request, $id, $name ) 
    {
        $action      = 'detail';
        $identitas   = Identitas::find(1);
        DB::update(DB::raw("UPDATE partner SET statistics=statistics+1 WHERE id=$id"));
        $content     = Media::where('status','=','active')->where('type','=','content')->first();
        $category    = Category::where('type','=','partner')->where('status','=','active')->get();
        $partner     = Partner::orderBy('id', 'DESC')->where('status','=','active')->where('id','=',$id)->first();
        $floor       = Floor::orderBy('id', 'ASC')->where('status','=','active')->where('partner_id','=',$id)->get();
        return view('website.location', compact('action','identitas','media','content','category','partner','floor'));
    }

    
    public function booking(Request $request, $length = 5) 
    { 
        $booking     = Booking_history::whereIn('status',['out','in'])->where('user_id','=', $request->user_id)->first();
        if(is_null($booking)) {
            @date_default_timezone_set('Asia/Jakarta');
    		$booking_code = "";
    		$characters = array_merge(range('1','100'), range('1','100'));
    		$max = count($characters) - 1;
    		for ($i = 0; $i < $length; $i++) {
    			$rand = mt_rand(0, $max);
    			$booking_code .= $characters[$rand];
    		}

            $booking = New Booking_history;
            $booking->booking_code =  $booking_code;
            $booking->partner_id = $request->partner_id;
            $booking->user_id = $request->user_id;
            $booking->save();
            \Session::flash('success', 'Terimakasih telah berhasil melakukan pembookingan tempat parkir!');
        } else {

            \Session::flash('warning', 'Anda belum menyelesaikan pembookingan tempat parkir!');
        }
            return redirect()->route('member.booking.history');
    }


}
