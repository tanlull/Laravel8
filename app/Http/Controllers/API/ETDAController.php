<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class ETDAController extends Controller
{

    public function curlPost($url, $token, $file)
    {
        try {
            $ch = curl_init();
            if (!is_resource($ch)) return false;
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, '@' . $file);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_VERBOSE, 0);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:application/octet-stream", "x-functions-key:$token"));
            $response = curl_exec($ch);
            curl_close($ch);
        } catch (Exception $e) {
            $response =  $e->getMessage();
        }
        return $response;
    }
    public function upload(Request $request)
    {

        try {
            // $data = [
            //     'messages' => '0000',
            //     'tkey' => env('TKEY', "ttttttttttttttttttttttttttttttttttt"),

            // ];
            // return response()->json($data, 200);
            $url = "https://api1212occt20210307201803.azurewebsites.net/api/UploadData";
            $token = "8o7O1Vy3s0bMxtYlBukQbnNQ5fljjYu7vqttap5O30HKSMNl/Kckrw==";
            $file = "C:/Users/tanlu/Documents/Document1212-Test-6.zip";
            $out = $this->curlPost($url, $token, $file);
        } catch (Exception $e) {
            $out = $e->getMessage();
        }
        return response()->json($out, 200);
    }
}
