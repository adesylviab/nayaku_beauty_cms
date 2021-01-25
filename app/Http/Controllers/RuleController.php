<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rules']=Rule::all();

        return view('rules.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['complaints']=DB::table('complaints')->select('complaints.id','complaints.keluhan','treatments.nama','complaints.kd_treatment')
        ->leftJoin('treatments','treatments.kd_treatment','complaints.kd_treatment')->get();
        $data['treatments']=Treatment::all();
        // dd($data);
        return view('rules.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule=new Rule();
        $rule->kd_rule=$request->kd_rule;
        $rule->kulit=$request->kulit;
        $rule->rule1=json_encode($request->rule);
        $rule->hasil=$request->hasil;
        $rule->save();
        return redirect()->route('rules');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function allKulit(Request $request)
    {
        $data=DB::table('complaints')->select('keluhan')->where('kulit',$request->kulit)->get();
        return response($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('rules')->where('id', $id)->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Sukses',
        ]);
    }

    public function hasil()
    {
        return view('konsul.index');
    }
}
