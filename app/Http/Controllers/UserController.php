<?php

namespace App\Http\Controllers;


use App\Services\GetUserService;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use Validator;

class UserController extends Controller {
    public function __construct() {

    }

    public function userList() {
        $userService = new GetUserService();
        $userDataList = $userService->getUserListAssoc();

        return view('user/user_control', array("userDataList"=>$userDataList));
    }

    public function getUserData($userID) {
        $getUserService = new GetUserService();
        $getUserService->setUserID($userID);
        $userData = $getUserService->getUserAssoc();

        return view('/user/edit_user', array("userData"=>$userData));
    }


    public function createUser() {
        $rules = array(
            'username' => 'required',
            'email'    => 'required|email',
            'password' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/add_user')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $user = new User();
            $user->name = Input::get('username');
            $user->email = Input::get('email');
            $user->password = bcrypt(Input::get('password'));
            $user->save();

            Session::flash('message', 'Successfully created nerd!');
            return Redirect::to('/user_control');
        }
    }

    public function updateUser($userID) {
        $rules = array(
            'username' => 'required',
            'email'    => 'required|email',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/edit_user')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $user = User::find($userID);
            $user->name = Input::get('username');
            $user->email = Input::get('email');
            if( !empty(Input::get('password')) ) {
                $user->password = bcrypt(Input::get('password'));
            }
            $user->save();

            Session::flash('message', 'Successfully created nerd!');
            return Redirect::to('/user_control');
        }
    }

    public function deleteUser($userID) {
        $user = User::find($userID);
        $user->delete();

        Session::flash('message', 'Successfully created nerd!');
        return Redirect::to('/user_control');
    }
}
