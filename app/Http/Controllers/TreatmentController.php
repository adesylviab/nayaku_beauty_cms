<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TreatmentController extends Controller
{
    public function index()
    {
        $data['treatments']=Treatment::all();
        // dd($data);
        return view('treatments.index',$data);
    }

    public function add()
    {
        return view('treatments.add');
    }

    public function store(Request $request)
    {
        $treatment=new Treatment();
        $treatment->kd_treatment=$request->kd_perawatan;
        $treatment->nama=$request->perawatan;
        $treatment->save();
        return redirect()->route('treatments');
    }

    public function edit($id)
    {
        $data['treatment']=Treatment::find($id);
        return view('treatments.edit',$data);
    }

    public function save(Request $request,$id)
    {
        $treatment=new Treatment();
        $treatment=Treatment::find($id);
        $treatment->kd_treatment=$request->kd_perawatan;
        $treatment->nama=$request->perawatan;
        $treatment->save();
        return redirect()->route('treatments');
    }

    public function delete($id)
    {
        DB::table('treatments')->where('id', $id)->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Sukses',
        ]);
    }
}
