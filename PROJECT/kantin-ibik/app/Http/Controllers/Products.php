<?php

namespace App\Http\Controllers;

use App\Models\Products as ModelsProducts;
use Illuminate\Http\Request;

class Products extends Controller
{
    public function index()
    {
        $products = ModelsProducts::all();
        return view('private.product-catalog.index')->with('products',$products);
    }

    public function show(Request $request)
    {
        $products = new ModelsProducts();
        $data['product'] = $products->getByCondition(array('id'=>$request->id))->first();

        return view('private.product-catalog.show',$data);
    }

    public function store(Request $request)
    {
        $products = new ModelsProducts();
        if(!empty($request->id)){
            $request->validate([
                'id' => 'required',
                'name' => 'required',
                'description' => 'required',
                'price'=> 'required'
            ]);
            $newFilename = "";

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $file= $request->file('image');
                $newFilename = time()."-".preg_replace('/\s+/', '-', $request->name).".jpg";
                //$filename= time()."-".$file->getClientOriginalName();

                $file->move(public_path('./assets/media/uploads/products'), $newFilename);
                //echo $request->image;
            }

            $request['images'] = ($newFilename) ? $newFilename : "";

            $results = $products->updatedData($request->all());
            return redirect()->route('catalog-product')->with('success',
                    ($results) ? 'Product saved.' : 'Product failed save.');
        }else{
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price'=> 'required'
            ]);

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $file= $request->file('image');
                //$filename= time()."-".$file->getClientOriginalName();
                $newFilename = time()."-".preg_replace('/\s+/', '-', $request->name).".jpg";
                $request['images'] = $newFilename;
                $file->move(public_path('./assets/media/uploads/products'), $newFilename);
            }

            $results = $products->storedData($request->all());
            return redirect()->route('catalog-product')->with('success',
                    ($results)? 'Product created successfully.': 'Product failed save.');
        }
    }
}
