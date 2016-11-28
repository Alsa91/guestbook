<?php

namespace App\Services;

use App\User;

class GetUserService {
    /** @var  int */
    private $userID;

    public function setUserID($userID) {
        $this->userID = $userID;
    }


    /**
     * @return mixed
     */
    public function getUser() {
        $user = User::where('id', $this->userID)->first();

        return $user;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getUserList() {
        $userList = User::all();

        return $userList;
    }

    /**
     * @return array
     */
    public function getUserAssoc() {
        $user = $this->getUser();
        $userAssoc = json_decode(json_encode($user), true);

        return $userAssoc;
    }

    /**
     * @return array
     */
    public function getUserListAssoc() {
        $userList = $this->getUserList();
        $userListAssoc = json_decode(json_encode($userList), true);

        return $userListAssoc;
    }
}