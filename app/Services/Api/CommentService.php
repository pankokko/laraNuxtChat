<?php

    namespace App\Services\Api;

    use App\Models\Comment;

    class CommentService
    {
        public function saveComment($data, $userId)
        {
            try {
                $comment = Comment::create([
                    'user_id'  => $userId,
                    'group_id' => 1,
                    'text'     => $data,
                ]);
                return $comment;
            } catch (\Exception $e) {
                logger()->error($e->getMessage());
                return false;
            }
        }
    }
