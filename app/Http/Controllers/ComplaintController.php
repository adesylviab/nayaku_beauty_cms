<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComplaintController extends Controller
{
    public function index()
    {
        $data['complaints']=DB::table('complaints')->select('complaints.id','complaints.kulit','complaints.keluhan','treatments.nama','complaints.kd_treatment')
        ->leftJoin('treatments','treatments.kd_treatment','complaints.kd_treatment')->get();
        
        return view('complaints.index',$data);
    }

    public function add()
    {
        $data['treatments']=Treatment::all();
        return view('complaints.add',$data);
    }

    public function store(Request $request)
    {
        foreach($request->keluhan as $keluhan){
            
            $complaint=new Complaint();
            $complaint->kulit=$request->kulit;
            $complaint->keluhan=$keluhan;
            $complaint->kd_treatment='A';
            $complaint->save();
        }
        
        return redirect()->route('complaints');
    }

    public function edit($id)
    {
        $data['complaint']=Complaint::find($id);
        // dd($data);
        return view('complaints.edit',$data);
    }

    public function save($id,Request $request)
    {
        $complaint=new Complaint();
        $complaint=Complaint::find($id);
        $complaint->keluhan=$request->keluhan;
        $complaint->kulit=$request->kulit;
        $complaint->kd_treatment=1;
        $complaint->save();        
        return redirect()->route('complaints');
    }

    public function delete($id)
    {
        DB::table('complaints')->where('id', $id)->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Sukses',
        ]);
    }
}
