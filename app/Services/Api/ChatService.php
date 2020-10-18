<?php

    namespace App\Services\Api;

    use App\Models\Chat;

    class ChatService
    {
        public function fetchAllDataForChatRoom($user)
        {
            $query = $user->with(['groups', 'comments'])->first();
            return $query;
        }
    }
