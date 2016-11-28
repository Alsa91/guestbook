<?php

namespace App\Services;

use App\User;

class CreateUserService {
    private $user;

    /** @var  string */
    private $name;
    /** @var  string */
    private $password;
    /** @var  string */
    private $userGroupName;

    public function setUser($user) {
        $this->user = $user;
    }

    public function create() {
        $user = new User();
        $user->name = $this->name;
        $user->password = $this->password;
        $user->save();
    }
}