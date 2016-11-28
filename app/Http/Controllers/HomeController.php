<?php

namespace App\Http\Controllers;

use App\Services\GetUserService;
use App\Services\UserService;
use Illuminate\Http\Request;

use App\Person;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');//aut
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('home');
    }

    public function test() {
        $g = Auth::guest();
        $u = Auth::user()->name;
        $uid = Auth::user()->id;
    }
}
