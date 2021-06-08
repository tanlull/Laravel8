<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'pid' => 'ธัญญา',
            'cid' => 'xxx',
            'status' => 'success'
        ];
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'pid' => $request->input('pid'),
            'cid' => $request->input('cid'),
            //'time' => config("app.timezone"),
            'xkey' => env('XKEY', 'xxxxxxxx'),

        ];
        return response()->json($data, 200);
    }

    public function authen1(Request $request)
    {
        $data = [
            //'pid' => $request->input('pid'),
            //'cid' => $request->input('cid'),
            //'time' => config("app.timezone"),
            'messages' => '0000',
            'xkey' => env('XKEY', 'xxxxxxxx'),

        ];
        return response()->json($data, 200);
    }

    public function authen2(Request $request)
    {
        $data = [
            'messages' => '0000',
            'tkey' => env('TKEY', "ttttttttttttttttttttttttttttttttttt"),

        ];
        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prodcut = [
            'pid' => 'ธัญญา',
            'cid' => $id,
            'status' => 'success'
        ];
        return response()->json($prodcut, 200);
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
}
