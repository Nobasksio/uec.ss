<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 17/05/2019
 * Time: 11:33
 */

namespace App\Http\Controllers;


use App\Department;
use App\Http\Requests\AsseptInvite;
use App\Http\Requests\CreateInvite;
use App\Invite;
use App\Position;
use App\User;
use http\Env\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class InviteController extends Controller
{
    public function indexList(){
        $invites = Invite::all();
        return view('user/index_invite',['invites' => $invites]);
    }
    public function invite(){
        $positions = Position::all();
        $departments = Department::all();
        return view('user/new',[
            'positions' => $positions,
            'departments' => $departments
        ]);
    }


    public function invitePost(CreateInvite $request)
    {
        $invite = new Invite();

        $invite->name = $request['name'];
        $invite->email = $request['email'];
        $invite->position_id = $request['position'];
        $invite->department_id = $request['department'];
        $invite->project_id = 0;
        $invite->active = true;
        $invite->hash = md5(uniqid());

        $invite->save();

        return back()->with('success','Приглашение успешно отправлено');
    }

    public function acceptInvite(){

        $hash = Input::get('hash');

        $invite = Invite::where('hash', $hash)->first();

        return view('user/accept_invite',['invite'=>$invite]);
    }

    public function acceptInvitePost(AsseptInvite $asseptInvite)
    {
        $user = new User();

        $hash = $asseptInvite['hash'];
        $invite = Invite::where('hash', $hash)->first();

        $user->name = $invite['name'];
        $user->email = $invite['email'];
        if($asseptInvite['password'] = $asseptInvite['password_retry']) {
            $pass = Hash::make($asseptInvite['password']);
            $user->password = $pass;
        } else {
            return back()->with('error','Пароли не совпадают');
        }


        $user->created_at = new \DateTime('now');
        $user->updated_at = new \DateTime('now');
        $user->email_verified_at = new \DateTime('now');
        $user->project_id = $invite['project_id'];
        $user->position_id = $invite['position_id'];
        $user->department_id = $invite['department_id'];

        $user->description = $asseptInvite['description'];
        $date_birthday = \DateTime::createFromFormat('d.m.Y', $asseptInvite['birthday']);

        $user->birthday = $date_birthday;

        $user->save();

        $invite->active = false;
        $invite->updated_at = new \DateTime('now');
        $invite->save();

        $redirect = redirect()->route('user_list');
        return $redirect;
    }


}