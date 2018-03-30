<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Models\Media;
use App\Models\Identitas;
use App\Models\Partner;

class MediaController extends Controller
{
    public function index()
    {
        $action     = 'view';
        $identitas  = Identitas::find(1);
        $data       = Media::whereIn('status', ['active', 'nonactive'])->get();
        $partner    = Partner::where('status','=','active')->get();
        return view('admin.media', compact('action','data','identitas','partner'));
    }

    public function create_submit(Request $request)
    {

        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg|max:4048',
        ]);
        $extention_image = Input::file('image')->getClientOriginalExtension();
        $image = 'image-'.rand(11111,99999).'.'. $extention_image;
        $request->file('image')->move(
            base_path() . '/public/upload/media/', $image
        );
        Media::create([
            'type' => $request->type,
            'description' => $request->description,
            'partner_id' => $request->partner_id,
            'image' => asset('/upload/media/'.$image)
        ]);
        Session::flash('success', 'Telah berhasil menambahkan data  media');
        return  redirect()->route('internal.media');
    }


    public function update_submit(Request $request, $id)
    {
        $media = Media::find($id);
        $media->type = $request->type;
        $media->description = $request->description;
        $media->partner_id = $request->partner_id;
        if($request->file('image') != null) {
          File::delete(public_path('/public/upload/media/'.$media->image)); 
          $extention_image = Input::file('image')->getClientOriginalExtension();
          $image = 'image-'.rand(11111,99999).'.'. $extention_image;
          $request->file('image')->move(
            base_path() . '/public/upload/media/', $image
        );
          $media->image = asset('/upload/media/'.$image);
      }
      $media->save();
      Session::flash('success', 'Telah berhasil mengedit data media');
      return  redirect()->route('internal.media'); 
  }


   public function status(Request $request, $id)
   {
        $media = Media::find($id); 
        if ($media->status == 'nonactive') {
            $media->status = 'active';
        } else {
            $media->status = 'nonactive';
        }
        $media->save();
        Session::flash('success', 'Telah berhasil mengedit status media');
        return  redirect()->route('internal.media');
    }

     public function delete(Request $request, $id)
    {
        $partner = Media::where('id','=', $id)->update(['status' => 'delete']); 
        Session::flash('success', 'Telah berhasil menghapus media');
        return  redirect()->route('internal.media');
    }

   
}