<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Models\Floor;
use App\Models\Identitas;
use App\Models\Partner;

class FloorController extends Controller
{
    public function index(Request $request, $id)
    {
        $action        = 'view';
        $identitas     = Identitas::find(1);
        $data          = Floor::whereIn('status', ['active', 'nonactive'])->where('partner_id', $id)->get();
        $partner       = Partner::where('id', $id)->first();
        return view('admin.floor', compact('action','data','identitas','partner'));
    }

    public function create_submit(Request $request, $id)
    {
        $extention_image = Input::file('image')->getClientOriginalExtension();
        $image = 'image-'.rand(11111,99999).'.'. $extention_image;
        $request->file('image')->move(
            base_path() . '/public/upload/floor/', $image
        );
        Floor::create([
            'partner_id' => $id,
            'name' => $request->name,
            'description' => $request->description,
            'image' => asset('/upload/floor/'.$image),
        ]);

        // return response()->json($request);
        Session::flash('success', 'Telah berhasil menambahkan data lantai parkir');
        return  redirect()->route('internal.floor', $id);
    }


    public function update_submit(Request $request, $id)
    {
        $floor = Floor::find($id);
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);
        $floor->partner_id = $request->partner_id;
        $floor->name = $request->name;
        $floor->description = $request->description;
        if($request->file('image') != null) {
          File::delete(public_path('/public/upload/floor/'.$floor->image)); 
          $extention_image = Input::file('image')->getClientOriginalExtension();
          $image = 'image-'.rand(11111,99999).'.'. $extention_image;
          $request->file('image')->move(
            base_path() . '/public/upload/floor/', $image
        );
          $floor->image = asset('/upload/floor/'.$image);
      }
      $floor->save();
      Session::flash('success', 'Telah berhasil mengedit data lantai parkir');
      return  redirect()->route('internal.floor', $floor->partner_id); 
  }


  public function status(Request $request, $id)
  {
    $floor = Floor::find($id); 
    if ($floor->status == 'nonactive') {
        $floor->status = 'active';
    } else {
        $floor->status = 'nonactive';
    }
    $floor->save();
    Session::flash('success', 'Telah berhasil mengedit status lantai parkir');
    return  redirect()->route('internal.floor', $floor->partner_id);
}

public function delete(Request $request, $id)
{
    $floor = Floor::find($id); 
    $delete = Floor::where('id','=', $id)->update(['status' => 'delete']); 
    Session::flash('success', 'Telah berhasil menghapus lantai parkir');
    return  redirect()->route('internal.floor', $floor->partner_id);
}


}