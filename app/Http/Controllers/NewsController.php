<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Models\News;
use App\Models\Identitas;
use App\Models\Category;
use Auth;


class NewsController extends Controller
{
    public function index()
    {
        $action = 'view';
        $identitas  = Identitas::find(1);
        $category   = Category::where('type','=','news')->where('status','=','active')->get();
        $data       = News::whereIn('status', ['active', 'nonactive'])->get();
        return view('admin.news', compact('action','data','identitas','category'));
    }

    public function create_submit(Request $request)
    {
        // return response()->json($request);

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:1048',
        ]);
        $extention_image = Input::file('image')->getClientOriginalExtension();
        $image = 'image-'.rand(11111,99999).'.'. $extention_image;
        $request->file('image')->move(
            base_path() . '/public/upload/news/', $image
        );
        News::create([
            'admin_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => asset('/upload/news/'.$image)
        ]);
        Session::flash('success', 'Telah berhasil menambahkan data berita');
        return  redirect()->route('internal.news');
    }


    public function update_submit(Request $request, $id)
    {
        $news = news::find($id);
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);
        $news->title = $request->title;
        $news->description = $request->description;
        $news->category_id = $request->category_id;
        if($request->file('image') != null) {
          File::delete(public_path('/public/upload/news/'.$news->image)); 
          $extention_image = Input::file('image')->getClientOriginalExtension();
          $image = 'image-'.rand(11111,99999).'.'. $extention_image;
          $request->file('image')->move(
            base_path() . '/public/upload/news/', $image
        );
          $news->image = asset('/upload/news/'.$image);
      }
      $news->save();
      Session::flash('success', 'Telah berhasil mengedit data berita');
      return  redirect()->route('internal.news'); 
  }


   public function status(Request $request, $id)
   {
        $news = news::find($id); 
        if ($news->status == 'nonactive') {
            $news->status = 'active';
        } else {
            $news->status = 'nonactive';
        }
        $news->save();
        Session::flash('success', 'Telah berhasil mengedit status berita');
        return  redirect()->route('internal.news');
    }

     public function delete(Request $request, $id)
    {
        $partner = news::where('id','=', $id)->update(['status' => 'delete']); 
        Session::flash('success', 'Telah berhasil menghapus berita');
        return  redirect()->route('internal.news');
    }

   
}