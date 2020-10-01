<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    use App\Services\RestService;


    class RestController extends Controller
    {
        public function get(Request $request)
        {
            $res = array(
                "title" => "REST API",
                "message" => "GET処理",
//                "UNIQID" => $request->session()->get('UNIQID'),
                "CSRF" => csrf_token(),
            );
            return response()->json($res);
        }

        public function add(Request $request)
        {
            $res = array(
                "title" => "REST API",
                "message" => "POST処理",
//                "UNIQID" => $request->session()->get('UNIQID'),
                "CSRF" => csrf_token(),
            );
            return response()->json($res);
        }

        public function edit(Request $request)
        {
            $res = array(
                "title" => "REST API",
                "message" => "PUT処理",
                "UNIQID" => $request->session()->get('UNIQID'),
                "CSRF" => csrf_token(),
            );
            return response()->json($res);
        }

        public function remove(Request $request)
        {
            $res = array(
                "title" => "REST API",
                "message" => "DELETE処理",
                "UNIQID" => $request->session()->get('UNIQID'),
                "CSRF" => csrf_token(),
            );
            return response()->json($res);
        }

    }
