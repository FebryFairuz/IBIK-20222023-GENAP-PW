<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(){
        $dataLect = array("npm"=>3320190306, "fname"=>"Febry", "mname"=>"Damatraseta", "lname"=>"Fairuz", "gender"=>"M");
        $dataStd1 = array("npm"=>212310038, "fname"=>"Danilson", "mname"=>"", "lname"=>"Daka", "gender"=>"M");
        $dataStd2 = array("npm"=>212310016, "fname"=>"Katarina", "mname"=>"Andrea", "lname"=>"Laurentia", "gender"=>"F");
        $dataStd3 = array("npm"=>212310022, "fname"=>"Raynaldi", "mname"=>"Rizky", "lname"=>"Aditya", "gender"=>"M");
        $dataStudent = array($dataStd1,$dataStd2,$dataStd3);

        return view('modules.dashboard.dashboard')->with('data', array("lect"=>$dataLect, "students"=>$dataStudent));
    }
}
