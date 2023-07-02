<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderRel;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\Cast\Object_;

class OrdersController extends Controller
{
    public function stored(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'payment' => 'required|integer',
            'billing' => 'required',
            'product' => 'required|array',
            'current_user' => 'required|string'
        ]);
        $arrdata = array();
        if ($validator->fails()) {
            $arrdata = array(
                'code' => 200,
                'result' => false,
                'data' => [],
                'message' => $validator->messages()
            );
        } else {
            //generate code transaction
            $orders = Orders::all();
            $totalOrder = $orders->count();
            $codeOrder = "TNX0" . rand(10, 100) . "00" . ($totalOrder + 1);
            $currentuser = $request->current_user;

            $postOrder = array("code" => $codeOrder, "total" => $request->billing, "payment_id" => $request->payment, "created_by" => $currentuser);

            //insert to order rel & order
            $orders = new Orders();
            $insert = $orders->storedData($postOrder);
            if ($insert) {
                $order_id = $insert->id;
                $post_order_rel = [];
                if (count($request->product) > 0) {
                    $resorderrel = [];
                    foreach ($request->product as $p) {
                        $post_order_rel = array("product_id" => $p['id'], "quantity" => $p['jml'], "price" => $p['price'], "order_id" => $order_id);
                        $orderrel = new OrderRel();
                        $insertOrderRel = $orderrel->storedData($post_order_rel);
                        $resorderrel[] = $insertOrderRel;
                    }
                    $arrdata = array(
                        'code' => 200,
                        'result' => true,
                        'data' => array("product" => $resorderrel, "order" => $postOrder),
                        'message' => "Your order being processing"
                    );
                }
            } else {
                $arrdata = array(
                    'code' => 200,
                    'result' => false,
                    'data' => [],
                    'message' => "Failed insert order"
                );
            }
        }
        return response()->json($arrdata, $arrdata['code']);
    }

    public function invoice(Request $request)
    {
        $orders = new Orders();
        $result = $orders->fetchInvoice($request->code);
        $arrdata = array(
            'code' => 200,
            'result' => true,
            'data' => $result,
            'message' => ""
        );
        return response()->json($arrdata, $arrdata['code']);
    }

    public function allinvoice()
    {
        $orders = new Orders();
        $results = $orders->fetchOrderHist();
        $arrdata = array(
            'code'=>200,
            'result'=>true,
            'data'=>$results,
            'message'=>""
        );
        return response()->json($arrdata, $arrdata['code']);
    }
}
