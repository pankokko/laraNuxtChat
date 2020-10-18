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


    /**
     * @param string $message
     * @param array $result
     */
    public function sendResponse($result, $message)
    {
        $data = $this->convertToUtf8($this->makeResponse($message, $result));
        return Response::json($data);
    }

    public function sendError($error, $code = 404)
    {
        return Response::json($this->makeError($error), $code);
    }


    public function sendSuccess($message)
    {
        return Response::json([
            'success' => true,
            'message' => $message
        ], 200);
    }

    /**
     * @param string $message
     * @param mixed $data
     *
     * @return array
     */
    public static function makeResponse($message, $data)
    {
        return Response::json([
            'success' => true,
            'data'    => $data,
            'message' => $message,
        ]);
    }

    /**
     * @param string $message
     * @param array $data
     *
     * @return array
     */
    public static function makeError($message, array $data = [])
    {
        $res = [
            'success' => false,
            'message' => $message,
        ];

        if (!empty($data)) {
            $res['data'] = $data;
        }

        return $res;
    }

    /**
     * 再起的にutf8へエンコードを行う
     * @param $data
     * @return array|false|string
     */
    private function convertToUtf8($data)
    {

        if (is_string($data)) {
            return mb_detect_encoding($data) === false ? utf8_encode($data) : $data;
        } elseif (is_array($data)) {
            $ret = [];
            foreach ($data as $i => $d) {
                $ret[$i] = $this->convertToUtf8($d);
            }

            return $ret;
        } else {
            return $data;
        }
    }
}
