<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInvite;
use App\Invite;
use App\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function userlist(){
        $users = User::all();

        return view('user/index',['users' => $users]);
    }


    public function restaurantList(){
        return view('restaurant/index');
    }

    public function restaurantRedact(){
        return view('restaurant_redact');
    }

    public function positionList(){
        return view('position/list');
    }

    public function positionRedact(){
        return view('position_redact');
    }
}
