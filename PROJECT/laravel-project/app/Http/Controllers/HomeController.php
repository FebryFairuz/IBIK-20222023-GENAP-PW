<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller{

    public function index(){
        $dataArr = array();
        $dataArr[] = array("id"=>1, "name"=>"Biskuit Oreo", "price"=>26000, "discount"=>77, "stock"=>9, "img"=>"https://images.tokopedia.net/img/cache/300-square/product-1/2020/9/1/55608018/55608018_944cdc5d-e35c-485e-b00a-b0a5fae6d87b_2048_2048");
        $dataArr[] = array("id"=>2, "name"=>"Skincare", "price"=>20000, "discount"=>54, "stock"=>2, "img"=>"https://images.tokopedia.net/img/cache/300-square/VqbcmM/2022/9/7/745947b2-944f-4b63-95b5-b3083b44d649.jpg");
        $dataArr[] = array("id"=>3, "name"=>"Sirup Batuk", "price"=>89000, "discount"=>64, "stock"=>1, "img"=>"https://images.tokopedia.net/img/cache/300-square/VqbcmM/2023/3/23/244b3dac-eb9a-44f9-8874-bb6658817a53.jpg");
        $dataArr[] = array("id"=>4, "name"=>"Sianida", "price"=>44000, "discount"=>26, "stock"=>90, "img"=>"https://images.tokopedia.net/img/cache/300-square/VqbcmM/2022/1/11/aada252e-0cd7-4055-9b2f-767e490f7cfa.jpg");
        $dataArr[] = array("id"=>5, "name"=>"Tolak Angin", "price"=>36000, "discount"=>29, "stock"=>1, "img"=>"https://images.tokopedia.net/img/cache/300-square/VqbcmM/2021/11/16/b7c3acf2-69ec-4d5a-95f3-0f93f70b3669.jpg");
        //$dataArr = array($product1,$product2,$product3,$product4,$product5);
        return view('clone_tokped.modules.home')->with("data",$dataArr);
    }


    public function home(){
        $name = "Rafi";
        $npm = 123.3;
        //1 array
        $dataArr1 = array("npm"=>1234, "name"=>"Rizki");
        $dataArr2 = array("npm"=>321, "name"=>"Raden");
        $dataMultiArr = array($dataArr1,$dataArr2);

        //return view('clone_tokped.modules.home',['name'=>$name,'npm'=>$npm]);
        return view('clone_tokped.modules.home')->with('data',$dataMultiArr);
    }
    public function chart()
    {
        return view('clone_tokped.modules.chart');
    }


}
