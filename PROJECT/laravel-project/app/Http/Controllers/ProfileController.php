<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        return view('modules.profiles.profile');
    }

    public function indentity(){
        return view('modules.profiles.detail');
    }

    public function family(){
        return view('modules.profiles.info');
    }
}
