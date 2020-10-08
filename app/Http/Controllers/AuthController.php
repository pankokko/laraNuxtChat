<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use App\Services\Auth\AuthService;
    use App\Post;
    use App\Http\Controllers\Api\AbstractApiController;

    class AuthController extends AbstractApiController
    {
        protected $service;

        public function __construct(AuthService $authService)
        {
            $this->service = $authService;
            $this->middleware('auth:api', ['except' => ['login']]);
        }

        /**
         * Get a JWT via given credentials.
         *
         * @return \Illuminate\Http\JsonResponse
         */
        public function login()
        {
            $credentials = request(['email', 'password']);

            if ($this->service->checkAuth()) {
                return response()->json(
                    [
                        'error' => 'you allready logging in',
                        'user'  => auth()->user(),
                    ],
                    200);
            }

            if (!$token = auth()->attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            return $this->respondWithToken($token);
        }

        /**
         * Get the authenticated User.
         *
         * @return \Illuminate\Http\JsonResponse
         */
        public function me(Request $request)
        {
            return $this->responseData($request);
        }

        /**
         * Log the user out (Invalidate the token).
         *
         * @return \Illuminate\Http\JsonResponse
         */
        public function logout()
        {
            auth()->logout();
            return response()->json(['message' => 'Successfully logged out']);
        }

        /**
         * Refresh a token.
         *
         * @return \Illuminate\Http\JsonResponse
         */
        public function refresh()
        {
            return $this->respondWithToken(auth()->refresh());
        }

        public function save(Request $request)
        {
            $request['content'];
            $test = Post::create(['content' => $request['content']]);

            if (!$test) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            return response()->json($test);
        }
    }
