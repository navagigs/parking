<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Models\Category;
use App\Models\Identitas;

class CategoryController extends Controller
{
    public function index()
    {
        $action = 'view';
        $identitas          = Identitas::find(1);
        $data = category::whereIn('status', ['active', 'nonactive'])->get();
        return view('admin.category', compact('action','data','identitas'));
    }

    public function create_submit(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'icon' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:1048',
        ]);
        $extention_image = Input::file('image')->getClientOriginalExtension();
        $image = 'image-'.rand(11111,99999).'.'. $extention_image;
        $request->file('image')->move(
            base_path() . '/public/upload/category/', $image
        );
        category::create([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
            'icon' => $request->icon,
            'image' => asset('/upload/category/'.$image)
        ]);
        Session::flash('success', 'Telah berhasil menambahkan data  kategori');
        return  redirect()->route('internal.category');
    }


    public function update_submit(Request $request, $id)
    {
        $category = Category::find($id);
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'icon' => 'required',
        ]);
        $category->name = $request->name;
        $category->type = $request->type;
        $category->description = $request->description;
        $category->icon = $request->icon;
        if($request->file('image') != null) {
          File::delete(public_path('/public/upload/category/'.$category->image)); 
          $extention_image = Input::file('image')->getClientOriginalExtension();
          $image = 'image-'.rand(11111,99999).'.'. $extention_image;
          $request->file('image')->move(
            base_path() . '/public/upload/category/', $image
        );
          $category->image = asset('/upload/category/'.$image);
      }
      $category->save();
      Session::flash('success', 'Telah berhasil mengedit data kategori');
      return  redirect()->route('internal.category'); 
  }


   public function status(Request $request, $id)
   {
        $category = Category::find($id); 
        if ($category->status == 'nonactive') {
            $category->status = 'active';
        } else {
            $category->status = 'nonactive';
        }
        $category->save();
        Session::flash('success', 'Telah berhasil mengedit status kategori');
        return  redirect()->route('internal.category');
    }

     public function delete(Request $request, $id)
    {
        $partner = Category::where('id','=', $id)->update(['status' => 'delete']); 
        Session::flash('success', 'Telah berhasil menghapus kategori');
        return  redirect()->route('internal.category');
    }

   
}