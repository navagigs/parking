<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Partner;
use App\Models\Category;
use App\Models\Block_type;
use App\Models\Identitas;
use DB;

class PartnerController extends Controller
{
    public function index()
    {
        $action = 'view';
        $identitas          = Identitas::find(1);
        $data = Partner::whereIn('status', ['active', 'nonactive'])->get();
        return view('admin.partner', compact('action','data','identitas'));
    }

    public function create()
    {
        $action = 'create';
        $identitas          = Identitas::find(1);
        $category        = Category::where('type','=','partner')->where('status','=','active')->get();
        return view('admin.partner', compact('action','category','identitas'));
    }

    public function create_submit(Request $request)
    {
        // return response()->json($request);
        $lastPartnerID = Partner::orderBy('id', 'DESC')->pluck('id')->first();
        $PartnerID = $lastPartnerID + 1;
        $this->validate($request, [
            'category_id' => 'required',
            'email' => 'required',
            'password' => 'required',
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'website' => 'required',
            'logo' => 'required',
        ]);
        $extention_logo = Input::file('logo')->getClientOriginalExtension();
        $logo = 'logo-'.rand(11111,99999).'.'. $extention_logo;
        $request->file('logo')->move(
            base_path() . '/public/upload/partner/', $logo
        );
        Partner::create([
            'category_id' => $request->category_id,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'phone' => $request->phone,
            'website' => $request->website,
            'logo' => asset('/upload/partner/'.$logo),
            'latittude' => $request->latittude,
            'longtitude' => $request->longtitude,
        ]);
        $block_type = Input::except(['block_type.size', 'block_type.price']);
        $block_type = $request->except('_token');
        foreach ($request->get('block_type') as $data)
        {
            Block_type::create([
                'partner_id'  => $PartnerID,
                'size'        => $data['size'],
                'price'       => $data['price'],
            ]);
        }
        Session::flash('success', 'Telah berhasil menambahkan data partner');
        return  redirect()->route('internal.partner');
    }


    public function update(Request $request, $id)
    {
        $action = 'update';
        $identitas = Identitas::find(1);
        $partner = Partner::find($id); 
        $block_type = Block_type::where('partner_id','=', $id)->get();
        $category = Category::where('type','=','partner')->where('status','=','active')->get();
        return view('admin.partner', compact('action','identitas','category','partner','block_type'));
    }

    public function update_submit(Request $request, $id)
    {
        $partner = Partner::find($id);
        $this->validate($request, [
            'category_id' => 'required',
            'email' => 'required|email',
            'name' => 'required',
            'description' => 'required',
            'phone' => 'required',
            'website' => 'required',
        ]);
        $partner->category_id = $request->category_id;
        $partner->email = $request->email;
        $partner->name = $request->name;
        $partner->description = $request->description;
        $partner->phone = $request->phone;
        $partner->website = $request->website;
        if ($request->input('address') != null) {
            $partner->address = $request->address;
            $partner->latittude = $request->latittude;
            $partner->longtitude = $request->longtitude;
        }
        if ($request->input('password') != null) {
            $partner->password = bcrypt($request->input('password'));
        }
        if($request->file('logo') != null) {
          File::delete(public_path('/public/upload/partner/'.$partner->logo)); 
          $extention_logo = Input::file('logo')->getClientOriginalExtension();
          $logo = 'logo-'.rand(11111,99999).'.'. $extention_logo;
          $request->file('logo')->move(
            base_path() . '/public/upload/partner/', $logo
        );
          $partner->logo = asset('/upload/partner/'.$logo);
      }
      $partner->save();
        $block_type = Input::except(['block_type.size', 'block_type.price']);
        $block_type = $request->except('_token');
        foreach ($request->get('block_type') as $data)
        {
            
            DB::table('block_type')->where('partner_id', '=', $id)->where('size', '=', $data['size'])
            ->update(array(
                'price'       => $data['price']));

        }
        // return $request->get('block_type');
      Session::flash('success', 'Telah berhasil mengedit data partner');
      return  redirect()->route('internal.partner'); 
    }


    public function status(Request $request, $id)
      {
        $partner = Partner::find($id); 
        if ($partner->status == 'nonactive') {
            $partner->status = 'active';
        } else {
            $partner->status = 'nonactive';
        }
        $partner->save();
        Session::flash('success', 'Telah berhasil mengedit status partner');
        return  redirect()->route('internal.partner');
    }

    public function verified(Request $request, $id)
    {
        $partner = Partner::find($id); 
        if ($partner->verified == 'unverified') {
            $partner->verified = 'verified';
        } else {
            $partner->verified = 'unverified';
        }
        $partner->save();
        Session::flash('success', 'Telah berhasil memverifikasi partner');
        return  redirect()->route('internal.partner');
    }

    public function delete(Request $request, $id)
    {
        $partner = Partner::where('id','=', $id)->update(['status' => 'delete']); 
        Session::flash('success', 'Telah berhasil menghapus partner');
        return  redirect()->route('internal.partner');
    }


}
