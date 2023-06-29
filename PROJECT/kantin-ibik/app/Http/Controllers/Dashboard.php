<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function index(){
        $products = Products::all();
        $payments = Payments::where(array("is_active"=>1))->get();
        return view('private.dashboard.index')->with(['products'=>$products, 'payments'=>$payments]);
    }
}
