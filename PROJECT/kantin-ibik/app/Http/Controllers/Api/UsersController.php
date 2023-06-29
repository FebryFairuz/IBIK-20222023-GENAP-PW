<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return 'this is a user controller';
        $arrdata = array();
        $user = User::all();
        if ($user->count() > 0) {
            $arrdata = array("code" => 200, "result" => true, "data" => $user, "message" => "");
        } else {
            $arrdata = array("code" => 404, "result" => false, "data" => [], "message" => "No record found");
        }

        return response()->json($arrdata, $arrdata['code']);
    }

    public function signin(Request $request)
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header('Access-Control-Allow-Headers: *');

        $arrdata = array();
        //$request->password = md5($request->password);
        $result = Auth::attempt($request->all());

        if ($result) {
            $detail = User::find(Auth::user()->id);
            $arrdata = array("code" => 200, "result" => true, "data" => $detail, "message" => "Welcome " . $detail->name);
        } else {
            $arrdata = array("code" => 404, "result" => true, "data" => $result, "message" => "No record found");
        }
        return response()->json($arrdata, $arrdata['code']);
    }

    public function detail(Request $request)
    {
        $arrdata = array();
        $user = User::where($request->all())->get();
        //('email','212310020@student.ibik.ac.id')->get();

        if (!$user->isEmpty()) {
            $arrdata = array("code" => 200, "result" => true, "data" => $user, "message" => "");
        } else {
            $arrdata = array("code" => 404, "result" => true, "data" => $user, "message" => "No record found");
        }
        return response()->json($arrdata, $arrdata['code']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
