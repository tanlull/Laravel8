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
        //$d = DB::select('select id,name from departments order by id desc');

        // $total = Department::count();
        // // return response()->json($d, 200);
        // return response()->json(
        //     [
        //         'total' => $total,
        //         'data' => $d
        //     ],
        //     200
        // );


        //pagination;
        //{{url}}/department?page=1&page_size=5

        $page_size = request()->query('page_size');
        $pageSize = $page_size == null ? 5 : $page_size;
        // $d = Department::paginate($pageSize);

        //relationship
        $d = Department::orderBy('id', 'desc')->with(['officers'])->get();

        $d = Department::orderBy('id', 'desc')->with(['officers'])->paginate($pageSize);

        $d = Department::orderBy('id', 'desc')->with(['officers' => function ($query) {
            $query->orderBy('salary', 'desc');
        }])->paginate($pageSize);

        return response()->json($d, 200);
    }

    //api/search/department?name=A
    public function search()
    {
        $query = request()->query('name');
        $keyword = '%' . $query . '%';
        $d = Department::where('name', 'like', $keyword)->get();
        $total = $d->count();
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

    public function update(Request $request, $id)
    {
        if ($request->id != $id) {
            return response()->json([
                "errors" => [
                    "status_code" => 400,
                    "message" => "ID not match"
                ]
            ], 400);
        }

        $d = Department::find($id);
        if ($d == null) {
            return response()->json([
                "errors" => [
                    "status_code" => 404,
                    "message" => "No data found"
                ]
            ], 404);
        }

        $d->name = $request->name;
        $d->save();
        return response()->json([
            'message' => 'Update OK',
            'data' => $d
        ], 201);
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
