<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function index() {
        return $this->json("Accessoslo RESTful API");
    }
    
    protected function json($data) {
        $response = array("success" => false);
        if(!isset($data["error"])){
            $response["success"] = true;
            $response["data"] = $data;
        }else{
            $response["error"] = $data["error"];
        }
        return response()->json($response);
    }
}
