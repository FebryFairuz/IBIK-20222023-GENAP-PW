<?php

namespace App\Http\Controllers;

use App\Models\Orders as ModelsOrders;
use Illuminate\Http\Request;

class Orders extends Controller
{
    public function reporting(){
        //$results = ModelsOrders::all();
        $orders = new ModelsOrders();
        $results = $orders->fetchOrderHist();
        return view('private.reporting.index')->with('orders',$results);
    }
}
