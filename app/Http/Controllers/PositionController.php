<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePosition;
use App\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index(){
        $positions = Position::all();
        return view('position/index',['positions' => $positions]);
    }
    public function positionCreatePost(CreatePosition $request)
    {
        $position = new Position();

        $position->name = $request['name'];
        $position->type = $request['type'];
        $position->active = true;


        $position->save();

        return back()->with('success','Приглашение успешно отправлено');
    }

    public function positionCreat(){
        return view('position/new');
    }
}
