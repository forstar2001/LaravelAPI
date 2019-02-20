<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\User;
use Auth;
use Hash;

class SettingsController extends Controller
{
    public function index() 
    {
        return view('setting.index');
    }
    public function getEmailUpdate() 
    {
        return view('setting.updateEmail');
    }
    public function getPasswordUpdate() 
    {
        return view('setting.updatePassword');
    }
    public function postEmailUpdate(Request $request) 
    {
        $this->validate($request,[
            'currentEmail'          => 'required|exists:users,email',
            'newEmail'              => 'required|email|confirmed',
            'newEmail_confirmation' => 'required'
        ]);
        $user = Auth::user();
        $user->email = $request->newEmail;
        $user->save();
        return redirect('settings/email/update')->with('message','The email address has been updated.');
        
    }
    public function postPasswordUpdate(Request $request) 
    {
        $this->validate($request,[
            'currentPassword'          => 'required',
            'newPassword'              => 'required|confirmed|min:5',
            'newPassword_confirmation' => 'required'
        ]);
        $user = Auth::user();
        if(Hash::check($request->currentPassword,$user->password))
        {
            $user->password = Hash::make($request->newPassword);
            $user->save();
            return redirect('settings/password/update')->with('message','The password has been updated.');
        }
        else
        {
            return redirect('settings/password/update')->with('error','The provided current password was invalid.');
        }
    }
    
    public function userForgotPassword(Request $request) 
    {
        $this->validate($request, ['email' => 'required|email']);
        
        // Check whether the user is blocked or not
        $block = User::where('email',$request->email)->first();
        if($block)
        {
            if($block->blocked==1)
            {
                return Response::json([
                'result'  => '',
                'error'   => 'UserBlocked',
                'status'  => 'ERROR'
            ],410);
            }
        }
        
        $response = Password::sendResetLink($request->only('email'), function (Message $message) {
            $message->subject($this->getEmailSubject());
        });

        switch ($response) {
            case Password::RESET_LINK_SENT:
                $result = ['email'=>$request->email];
                return Response::json([
                        'result'  => '',
                        'error'   => '',
                        'status'  => 'SUCCESS'
                ],200);


            case Password::INVALID_USER:
                return Response::json([
                        'result'  => '',
                        'error'   => 'NoUserFound',
                        'status'  => 'ERROR'
                ],404);
        }
    }
    protected function getEmailSubject()
    {
        return isset($this->subject) ? $this->subject : 'Your Password Reset Link';
    }
}
