<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Models\Block;
use App\Models\Block_type;
use App\Models\Identitas;
use App\Models\Floor;

class BlockController extends Controller
{
    public function index(Request $request, $id)
    {
        $action        = 'view';
        $identitas     = Identitas::find(1);
        $data          = Block::whereIn('status', ['active', 'nonactive'])->where('floor_id', $id)->get();
        $floor         = Floor::where('id', $id)->first();
        $block_type          = Block_type::where('partner_id', $floor->partner_id)->get();
        return view('admin.block', compact('action','data','identitas','floor','block_type'));
    }

    public function create_submit(Request $request)
    {
        Block::create([
            'floor_id' => $request->floor_id,
            'blocktype_id' => $request->blocktype_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // return response()->json($request);
        Session::flash('success', 'Telah berhasil menambahkan data block parkir');
        return  redirect()->route('internal.block', $request->floor_id);
    }


    public function update_submit(Request $request, $id)
    {
        $block = Block::find($id);
        $block->name = $request->name;
        $block->description = $request->description;
        $block->blocktype_id = $request->blocktype_id;
        $block->save();
        Session::flash('success', 'Telah berhasil mengedit data block parkir');
        return  redirect()->route('internal.block', $block->floor_id); 
    }


    public function status(Request $request, $id)
    {
        $block = Block::find($id); 
        if ($block->status == 'nonactive') {
            $block->status = 'active';
        } else {
            $block->status = 'nonactive';
        }
        $block->save();
        Session::flash('success', 'Telah berhasil mengedit status block parkir');
        return  redirect()->route('internal.block', $block->floor_id);
    }

    public function delete(Request $request, $id)
    {
        $block1 = Block::find($id); 
        $block = Block::where('id','=', $id)->update(['status' => 'delete']); 
        Session::flash('success', 'Telah berhasil menghapus block parkir');
        return  redirect()->route('internal.block', $block1->floor_id);
    }


}