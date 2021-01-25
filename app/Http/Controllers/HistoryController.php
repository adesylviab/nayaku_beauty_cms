<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        if(isset($_GET['type'])&&$_GET['type']!=null){
            if($_GET['type']||$_GET['type']==0&&$_GET['type']!=null){
                $data['histories']=DB::table('histories')->select('users.name','histories.*')
                ->leftJoin('users','users.id','histories.user_id')
                ->where('type',$_GET['type'])
                ->get();
            }
        }else{
            $data['histories']=DB::table('histories')->select('users.name','histories.*')
            ->leftJoin('users','users.id','histories.user_id')->get();
        }
        
        // dd($data);
        
        return view('history.index',$data);
    }

    public function detail($id)
    {
        $data['history']=DB::table('histories')->select('users.name','histories.*')
        ->leftJoin('users','users.id','histories.user_id')->where('histories.id',$id)->first();
        // dd($data);
        return view('history.detail',$data);
    }
}
