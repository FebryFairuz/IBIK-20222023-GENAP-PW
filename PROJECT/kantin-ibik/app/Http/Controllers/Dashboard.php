<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(){
        $products = Products::all();
        return view('private.dashboard.index')->with('products',$products);
    }
}
