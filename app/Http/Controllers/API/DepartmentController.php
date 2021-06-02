<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$d = Department::all();
        // $d = Department::find(2);
        //$d = Department::where('name', 'like', '%e%')->get();
        //$d = Department::select('id', 'name')->orderBy('id', 'desc')->get();
        $d = DB::select('select id,name from departments order by id desc');

        $total = Department::count();
        // return response()->json($d, 200);
        return response()->json(
            [
                'total' => $total,
                'data' => $d
            ],
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $d = new Department();
        $d->name = $request->name;
        $d->save();
        return response()->json([
            'message' => 'Insert OK',
            'data' => $d
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $d = Department::find($id);
        if ($d == null) {
            return response()->json([
                "errors" => [
                    "status_code" => 404,
                    "message" => "No data found"
                ]
            ], 404);
        }
        return response()->json($d, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d = Department::find($id);
        if ($d == null) {
            return response()->json([
                "errors" => [
                    "status_code" => 404,
                    "message" => "No data found"
                ]
            ], 404);
        }
        $d->delete();
        return response()->json([
            'Message' => 'Delete Succefully'
        ], 200);
    }
}
