<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 17/05/2019
 * Time: 11:33
 */

namespace App\Http\Controllers;


use App\Http\Requests\AsseptInvite;
use App\Invite;
use App\User;
use http\Env\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class InviteController extends Controller
{
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