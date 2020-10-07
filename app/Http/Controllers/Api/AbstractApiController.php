<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class AbstractApiController extends Controller
{
    protected function respondWithToken($token)
    {
        return response()->json([
            'user'         => auth()->user(),
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth("api")->factory()->getTTL() * 60
        ]);
    }

    protected function responseData($request)
    {

        return response()->json(
            $res = [
                'user'   => auth()->user(),
                'header' => $request->header('Authorization')
            ]
        );
    }
}
