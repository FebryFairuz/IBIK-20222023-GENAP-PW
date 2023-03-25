<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Profiles extends Controller
{
    public function index(){
        return view("modules.profiles.profile");
    }

    public function detail(){
        return view('modules.profiles.detail');
    }

    public function info(){
        return view('modules.profiles.info');
    }
}
