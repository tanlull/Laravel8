<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ETDAController extends Controller
{



    public function upload(Request $request)
    {
        $data = [
            'messages' => '0000',
            'tkey' => env('TKEY', "ttttttttttttttttttttttttttttttttttt"),

        ];
        return response()->json($data, 200);
    }
}
