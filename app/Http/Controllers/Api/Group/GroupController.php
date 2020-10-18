<?php

    namespace App\Http\Controllers\Api\Group;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Api\AbstractApiController;
    use App\Services\Api\Group\GroupService;

    class GroupController extends AbstractApiController
    {
        public function create(Request $request)
        {
            $group = new GroupService();
            $query = $group->createNewGroup($request->all());

            if (!$query) {
                return $this->sendError('データの保存に失敗しました', 200);
            }
            return $this->sendResponse($query, 200);
        }
    }
