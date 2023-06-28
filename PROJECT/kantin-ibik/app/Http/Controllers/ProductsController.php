<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProductsRequest;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::latest()->paginate(5);
        return view('modules.master-data.products.index',compact('products'))
               ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $products = new Products();
        if(!empty($request->id)){
            $request->validate([
                'id' => 'required',
                'name' => 'required',
                'description' => 'required',
                'price'=> 'required'
            ]);

            $results = $products->updatedData($request->all());
            return redirect()->route('m_products')->with('success',
                    ($results) ? 'Product saved.' : 'Product failed save.');
        }else{
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price'=> 'required'
            ]);
            $results = $products->storedData($request->all());
            return redirect()->route('m_products')->with('success',
                    ($results)? 'Product created successfully.': 'Product failed save.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $products = new Products();
        $data['product'] = $products->getByCondition(array('id'=>$request->id))->first();

        return view('modules.master-data.products.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $products = new Products();
        $product = $products->getByCondition(array('id'=>$request->id))->first();

        return json_encode($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductsRequest $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $products = new Products();
        $results = $products->removeByCondition(array('id'=>$request->id));

        return json_encode(array("message"=> ($results) ? 'Product deleted successfully' : 'Product failed remove'));
    }

}
