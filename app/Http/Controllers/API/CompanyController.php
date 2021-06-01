<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return env("APP_NAME") . " , Hello API : " . now() . "  " . config("app.timezone");
    }

    public function show($id)
    {
        return config("app.url") . " , Hello staff id = " . $id;
    }
}
