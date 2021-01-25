<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Image;

class ProductController extends Controller
{
    public function index()
    {
        $data['products']=Products::all();
        // dd($data);
        return view('products.index',$data);
    }

    public function add()
    {
        return view('products.add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'produk' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->file('foto');
        $input['imagename'] = time().'.'.$image->extension();
        $normal = Image::make($image)->resize(512, 512)->encode($image->extension());
        Storage::disk('s3')->put('/images/'.$input['imagename'], (string)$normal, 'public');

        $product = new Products();
        $product->nama=$request->produk;
        $product->foto="https://lizartku.s3.us-east-2.amazonaws.com/images/".$input['imagename'];
        $product->deskripsi=$request->deskripsi;
        $product->harga=$request->harga;
        $product->save();

        return redirect()->route('products');
    }

    public function edit($id)
    {
        $data['product']=Products::find($id);
        return view('products.edit',$data);
    }

    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'produk' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required'
        ]);

        if($request->file('foto')!=null){
            $image = $request->file('foto');
            $input['imagename'] = time().'.'.$image->extension();
            $normal = Image::make($image)->resize(512, 512)->encode($image->extension());
            Storage::disk('s3')->put('/images/'.$input['imagename'], (string)$normal, 'public');

        }
        
        $product = new Products();
        $product=Products::find($id);
        $product->nama=$request->produk;
        if($request->file('foto')!=null){
            $product->foto="https://lizartku.s3.us-east-2.amazonaws.com/images/".$input['imagename'];
        }
        $product->deskripsi=$request->deskripsi;
        $product->harga=$request->harga;
        $product->save();

        return redirect()->route('products');
    }

    public function delete($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Sukses',
        ]);
    }
}
