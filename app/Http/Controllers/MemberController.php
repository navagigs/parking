<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Identitas;
use App\Models\Media;
use App\Models\Category;
use App\Models\Partner;
use App\Models\City;
use App\Models\Floor;
use App\Models\Block;
use App\Models\Booking_history;
use App\Models\Booking;
use App\Models\Route;
use DB;
use Auth;

class MemberController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:member');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $identitas   = Identitas::find(1);
        $media       = Media::where('status','=','active')->where('type','=','slider')->get();
        $content     = Media::where('status','=','active')->where('type','=','content')->first();
        $category    = Category::where('type','=','partner')->where('status','=','active')->get();
        $partner     = Partner::where('status','=','active')->pluck('name', 'id');
        return view('member.dashboard', compact('identitas','media','content','category','partner'));
    }

    public function floor($id)
    {
        $floor = DB::table("floor")
        ->where("partner_id",$id)
        ->pluck("name","id");
        return json_encode($floor);
    }

    // public function booking(Request $request, $id, $name ) 
    // {
    //     $identitas   = Identitas::find(1);
    //     $media       = Media::where('status','=','active')->where('type','=','slider')->get();
    //     $content     = Media::where('status','=','active')->where('type','=','content')->first();
    //     $category    = Category::where('type','=','partner')->where('status','=','active')->get();
    //     $partner     = Partner::where('status','=','active')->pluck('name', 'id');
    //     return view('member.booking', compact('identitas','media','content','category','partner'));
    // }


    public function booking_history(Request $request) 
    {
        $action = 'bookinghistory';
        @date_default_timezone_set('Asia/Jakarta');
        $user_id     = Auth::user()->id;
        $identitas   = Identitas::find(1);
        $content     = Media::where('status','=','active')->where('type','=','content')->first();
        $category    = Category::where('type','=','partner')->where('status','=','active')->get();
        $booking     = Booking_history::whereIn('status',['out','in'])->where('user_id','=', $user_id)->first();
        return view('member.booking', compact('action','identitas','content','category','booking'));
    }

    public function booking_in(Request $request, $partner_id, $booking_code) 
    {
        $get_data = [
            'partner_id' => $partner_id,
            'booking_code' =>$booking_code
        ];
        $action = 'bookingin';
        @date_default_timezone_set('Asia/Jakarta');
        $user_id     = Auth::user()->id;
        $identitas   = Identitas::find(1);
        $content     = Media::where('status','=','active')->where('type','=','content')->first();
        $category    = Category::where('type','=','partner')->where('status','=','active')->get();
        $floor       = Floor::where('partner_id',$partner_id)->pluck('name','id');
        $getfloor    = Floor::where('partner_id', $partner_id)->first();
        $block       = Block::pluck('name','id');
        $list_block  = Block::where('status','=','active')->get();
        $list_route  = Route::select('route.id','route.start as start','route.end as end','block.name as route_start','blockend.name as route_end','route.range as range','route.path as path')->where('route.status', ['nonactive'])
        ->join('block', 'block.id', '=', 'route.start')
        ->join('block as blockend', 'blockend.id', '=', 'route.end')
        ->get(); 
        return view('member.booking', compact('action','identitas','content','category','floor','block','list_route','get_data','list_block'));
    }


    public function booking_search(Request $request, $partner_id, $booking_code) 
    {
        $get_data = [
            'partner_id' => $partner_id,
            'booking_code' =>$booking_code
        ];
        $action = 'bookingin';
        @date_default_timezone_set('Asia/Jakarta');
        $user_id     = Auth::user()->id;
        $identitas   = Identitas::find(1);
        $content     = Media::where('status','=','active')->where('type','=','content')->first();
        $category    = Category::where('type','=','partner')->where('status','=','active')->get();
        $block       = Block::pluck('name','id');
        $start   = $request->input('start');
        if (! empty($start)) {
            // $start = $request->input('start');
            $end      = $request->input('end');
            $list_route   = Route::select('route.id','route.start as start','route.end as end','block.name as route_start','blockend.name as route_end','route.range as range','route.path as path')->where('route.start', 'LIKE', '%' . $start. '%')->where('route.end', 'LIKE', '%' . $end. '%')
            ->join('block', 'block.id', '=', 'route.start')
            ->join('block as blockend', 'blockend.id', '=', 'route.end')
            ->get();

            return view('member.booking', compact('action','identitas','content','category','floor','block','list_route','get_data'));
        }

        return redirect('member.booking.in');
    }


    public function booking_rent(Request $request, $partner_id, $booking_code, $block_id, $size, $user_id) 
    {
        if($size == Auth::user()->size) {
         $bookingrent     = Booking::where('booking_status','=','in')->where('user_id','=', $request->user_id)->first();
           if(is_null($bookingrent)) {
               $booking = New Booking;

               $booking->partner_id    = $request->partner_id;
               $booking->block_id      = $request->block_id;
               $booking->booking_code  = $request->booking_code;
               $booking->size          = $request->size;
               $booking->user_id       = $request->user_id;
               $booking->save();
               DB::table('booking_history') ->where('booking_code', $request->booking_code)->update(array('status'=> 'in'));
               DB::table('block') ->where('id', $request->block_id)->update(array('status_rent'=> 'rent'));
               \Session::flash('success', 'Anda Telah memasuki tempat tempat parkir!');
                return redirect('member/booking/in/'.$partner_id.'-'.$booking_code.'/stay/'.$block_id.'-'.$size.'-'.$user_id.'/');
           } else {
                \Session::flash('warning', 'Anda belum menyelesaikan pembookingan tempat parkir!');
                return redirect('member/booking/in/'.$partner_id.'-'.$booking_code.'/');
        }
        } else {
                \Session::flash('warning', 'Maaf, ukuran kendaraan anda tidak sesuai dengan blok parkir!');
                return redirect('member/booking/in/'.$partner_id.'-'.$booking_code.'/');
        }

    }


    public function booking_stay(Request $request, $partner_id, $booking_code, $block_id, $size, $user_id) 
    {
        $get_data = [
            'partner_id' => $partner_id,
            'booking_code' =>$booking_code
        ];
        $action = 'bookingstay';
        $identitas   = Identitas::find(1);
        $content     = Media::where('status','=','active')->where('type','=','content')->first();
        $category    = Category::where('type','=','partner')->where('status','=','active')->get();

         return view('member.booking', compact('action','identitas','content','category','floor','block','list_route','get_data'));
    }

}