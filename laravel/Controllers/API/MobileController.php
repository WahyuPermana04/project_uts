<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Controllers\Controller;

class MobileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $myArr = array(
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password)
        // );
        // DB::table('users')->insert($myArr);
        // return response()->json([
        //     "status" => "success",
        //     "message" => "saved"
        // ], 200);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
            "status" => "success",
            "message" => "saved"
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function getMoviesNP()
    {
        $sel = DB::table('movies')->where('status', '=', '1')->get()->toJson(JSON_PRETTY_PRINT);
        return response($sel, 200);
    }

    function getMoviesBrowse()
    {
        $sel = DB::table('movies')->where('status', '=', '0')->get()->toJson(JSON_PRETTY_PRINT);
        return response($sel, 200);
    }

    function getMoviesCS(){
        $sel = DB::table('movies')->where('status', '=', '2')->get()->toJson(JSON_PRETTY_PRINT);
        return response($sel, 200);
    }
}
