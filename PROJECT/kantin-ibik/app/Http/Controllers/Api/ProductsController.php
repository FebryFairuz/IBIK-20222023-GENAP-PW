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
            $arrdata = array("code"=>200,"result"=>false, "data"=>[], "message"=>"No record found");
        }

        return response()->json($arrdata,$arrdata['code']);
    }

    public function stored(Request $request){
        $products = new Products();
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

    public function detail(Request $request) {
        $product = Products::where(array("id"=>$request->id))->first();
        if(!empty($product)){
            $arrdata = array("code"=>200,"result"=>true, "data"=>$product, "message"=>"");
        }else{
            $arrdata = array("code"=>200,"result"=>true, "data"=>[], "message"=>"No record found");
        }

        return response()->json($arrdata,$arrdata['code']);
    }

    public function destroy(Request $request){
        $results = Products::where(array('id'=>$request->id))->delete();
        if($results){
            $arrdata = array("code"=>200,"result"=>true, "data"=>$results, "message"=>"Successfully removed");
        }else{
            $arrdata = array("code"=>200,"result"=>true, "data"=>[], "message"=>"Failed remove");
        }
        return response()->json($arrdata,$arrdata['code']);
    }
}
