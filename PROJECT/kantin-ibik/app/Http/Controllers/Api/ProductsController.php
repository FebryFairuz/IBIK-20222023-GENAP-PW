<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function index(){
        $arrdata = array();
        $products = Products::all();
        if($products->count() > 0){
            $arrdata = array("code"=>200,"result"=>true, "data"=>$products, "message"=>"");
        }else{
            $arrdata = array("code"=>404,"result"=>false, "data"=>[], "message"=>"No record found");
        }

        return response()->json($arrdata,$arrdata['code']);
    }

    public function stored(Request $request){
        //var_dump($request->name);
        $products = new Products();
        // $request->validate([
        //     'name' => 'required',
        //     'description' => 'required',
        //     'price'=> 'required'
        // ]);
        // $results = $products->storedData($request->all());
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:50',
            'description'=>'required',
            'price'=>'required',
            'is_active'=>'required'
        ]);
        $arrdata=array();
        if($validator->fails()){
            $arrdata = array(
                'code'=>422,
                'result'=>false,
                'data'=>[],
                'message'=>$validator->messages()
            );
        }else{
            $postProduct = $products->storedData($request->all());

            if($postProduct){
                $arrdata = array(
                    'code'=>200,
                    'result'=>true,
                    'data'=>$postProduct,
                    'message'=>''
                );
            }else{
                $arrdata = array(
                    'code'=>403,
                    'result'=>false,
                    'data'=>$postProduct,
                    'message'=>'Something went wrong, failed save data'
                );
            }
        }

        return response()->json($arrdata,$arrdata['code']);
    }
}
