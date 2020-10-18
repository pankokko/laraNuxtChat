<?php

    namespace App\Services\Api\Group;

    use App\Models\Group;
    use App\User;

    class GroupService
    {
        public function createNewGroup($data)
        {
            $user = User::find(auth()->guard('api')->id());
            try {
                $group = Group::create([
                    'name' => $data['name'],
                ]);
                $user->groups()->attach($group->id);
            } catch (\Exception $e) {
                logger()->error($e->getMessage());
                return false;
            }

            return $group;
        }
    }
