<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data = array();
        $data['title'] = "Blade Directive";
        $data['npm'] = 212310029;
        $students[] = array("npm"=>212310004, "name"=>"Muhamad Agus Setiawan");
        $students[] = array("npm"=>212310029, "name"=>"Muhamad Ilham Fachririzal");
        $students[] = array("npm"=>212310044, "name"=>"Hana Yulia Rahmah");
        $students[] = array("npm"=>212310027, "name"=>"MUHAMMAD ASKAH");
        $students[] = array("npm"=>212310005, "name"=>"ADJIE SYERAFFI RAHMAT");
        $data['students'] = $students;
        return view('modules.home.home')->with("data",$data);
    }

    public function multiplearr(){
        $data = array();
        $data['title'] = "List of students";

        $students[] = array("npm"=>212310004, "name"=>"Muhamad Agus Setiawan");
        $students[] = array("npm"=>212310029, "name"=>"Muhamad Ilham Fachririzal");
        $students[] = array("npm"=>212310044, "name"=>"Hana Yulia Rahmah");
        $students[] = array("npm"=>212310027, "name"=>"MUHAMMAD ASKAH");
        $students[] = array("npm"=>212310005, "name"=>"ADJIE SYERAFFI RAHMAT");
        $data['students'] = $students;

        return view('modules.home.home')->with("data",$data);
    }
}
