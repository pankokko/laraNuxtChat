<?php

    namespace App\Http\Controllers\Api\Chat;

    use App\Http\Controllers\Api\AbstractApiController;

    use App\Comment;
    use App\Services\Api\CommentService;
    use Illuminate\Http\Request;

    class ChatController extends AbstractApiController
    {
        protected $commentService;

        public function __construct(CommentService $commentService)
        {
            $this->commentService = $commentService;
        }


        public function store(Request $request)
        {
            $query = $this->commentService->saveComment($request->input('text'), auth()->guard('api')->id());

            if (is_null($query)) {
                return $this->sendError('データの保存に失敗しました', 400);
            }
            return $this->sendResponse('データの保存に成功しました', 200);
        }
    }
