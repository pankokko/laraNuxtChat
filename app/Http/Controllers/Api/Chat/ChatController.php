<?php

    namespace App\Http\Controllers\Api\Chat;

    use App\Http\Controllers\Api\AbstractApiController;
    use App\Services\Api\ChatService;
    use App\User;
    use App\Services\Api\CommentService;
    use Illuminate\Http\Request;

    class ChatController extends AbstractApiController
    {
        private $commentService;
        private $chatService;

        public function __construct(CommentService $commentService, ChatService $chatService)
        {
            $this->chatService = $chatService;
            $this->commentService = $commentService;
        }

        public function index()
        {
            $user = User::find(auth()->guard('api')->id());
            $data = $this->chatService->fetchAllDataForChatRoom($user);
            if (is_null($data)) {
                return $this->sendError('データを取得することができませんでした', 200);
            }
            return $this->makeResponse($data, 200);
        }

        public function store(Request $request)
        {
            $query = $this->commentService->saveComment($request->input('text'), auth()->guard('api')->id());
            if (is_null($query)) {
                return $this->sendError('データの保存に失敗しました', 400);
            }
            return $this->sendResponse($query, 200);
        }
    }
