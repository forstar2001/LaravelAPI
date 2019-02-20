<?php

namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Token;
use App\Services\UserServices;
use Hash;
use Carbon\Carbon;
use Validator;
use Response;
use Password;
use Illuminate\Mail\Message;
use Mail;

class AppUserController extends Controller
{
    /*
    * register user with the system
    */
    public function userRegister(Request $request) 
    {
        //check email already exist
        $userServices = new UserServices;
        $user_email   = $userServices->checkUserExist('email',$request->email);
        if(count($user_email)>0)
        {
            return Response::json([
                'result'  => '',
                'error'   => 'Email address already exists.',
                'status'  => 'ERROR'
            ],406);
        }
        //check username already exist
        $user_name = $userServices->checkUserExist('username',$request->username);
        if(count($user_name)>0)
        {
            return Response::json([
                'result'  => '',
                'error'   => 'Username already exists.',
                'status'  => 'ERROR'
            ],456);
        }
      
        //check validation
        $validator = Validator::make($request->all(), [
            'password'    => 'required',
            'email'       => 'required',
            'username'    => 'required',
            'device_id'   => 'required',
            'device_type' => 'required',
        ]);
        if ($validator->fails()) 
        {
            return Response::json([
                'result'  => '',
                'error'   => 'RequiredFieldsNull',
                'status'  => 'ERROR'
            ],422);
        }
        //register user with the system
        $result = $userServices->registerUser($request);
        return Response::json([
            'result'  => $result,
            'error'   => '',
            'status'  => 'SUCCESS'
        ],200);
    }
    /*
    * user logout remove session details
    */
    public function userLogout(Request $request) 
    {
        $userServices = new UserServices;
        return $userServices->userLogout($request);
    }
    /*
    * user login
    */
    public function userLogin(Request $request) 
    {
        $userServices = new UserServices;
        return $userServices->userLogin($request);
    }
    /*
    * user profile details
    */
    public function userProfile(Request $request) 
    {
        $userServices = new UserServices;
        return $userServices->userProfile($request);
    }
    /*
    * update user profile details
    */
    public function updateProfile(Request $request) 
    {
        $userServices = new UserServices;
        return $userServices->updateProfile($request);
    }
    /*
    * send reset password email
    */
    public function userForgotPassword(Request $request) 
    {
        $this->validate($request, ['email' => 'required|email']);
        // Check whether the user is blocked or not
        $block = User::where('email',$request->email)->first();
        $response = Password::sendResetLink($request->only('email'), function (Message $message) {
            $message->subject($this->getEmailSubject());
        });
        switch ($response) 
        {
            case Password::RESET_LINK_SENT:
                $result = ['email'=>$request->email];
                return Response::json([
                    'result'   => $result,
                    'error'    => '',
                    'status'   => 'SUCCESS'
                ],200);
                
            case Password::INVALID_USER:
                return Response::json([
                    'result'   => '',
                    'error'    => 'Email does not match with our records.',
                    'status'   => 'ERROR'
                ],404);
        }
    }
    /*
    * get email subjetct
    */
    protected function getEmailSubject()
    {
        return isset($this->subject) ? $this->subject : 'Your Password Reset Link';
    }
    /*
    * reset passeord
    */
    public function postReset(Request $request)
    {
        $this->validate($request, [
            'token'    => 'required',
            'email'    => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        $credentials = $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );

        $response = Password::reset($credentials, function ($user, $password) {
            $this->resetPassword($user, $password);
        });

        switch ($response) 
        {
            case Password::PASSWORD_RESET:
                //load view after reset password
                return view('email.confirm');

            default:
                return redirect()->back()
                            ->withInput($request->only('email'))
                            ->withErrors(['email' => trans($response)]);
        }
    }
    /*
    * save new password
    */
    protected function resetPassword($user, $password)
    {
        $user->password = bcrypt($password);
        $user->save();
    }
    /*
    * update profile picture
    */
    public function updateProfilePicture(Request $request) 
    {
        $userServices = new UserServices;
        return $userServices->pictureUpdate($request);
    }
    /*
    * follow user
    */
    public function followUser(Request $request) 
    {
        $userServices = new UserServices;
        return $userServices->followUser($request);
    }
    /*
    * unfollow user
    */
    public function unfollowUser(Request $request) 
    {
        $userServices = new UserServices;
        return $userServices->unfollowUser($request);
    }
    /*
    * list followings
    */
    public function listFollowing(Request $request) 
    {
        $userServices = new UserServices;
        return $userServices->listFollowings($request);
    }
    /*
    * list followings
    */
    public function listFollowers(Request $request) 
    {
        $userServices = new UserServices;
        return $userServices->listFollowers($request);
    }
    /*
    * search users by username
    */
    public function searchUsers(Request $request)
    {
        $userServices = new UserServices;
        //check validation
        $validator = Validator::make($request->all(), [
            'key'      => 'required',
        ]);
        if ($validator->fails()) 
        {
            return Response::json([
                'result'  => '',
                'error'   => 'RequiredFieldsNull',
                'status'  => 'ERROR'
            ],422);
        }
        return $userServices->searchUsers($request);
    }
    /*
    * Other user profile 
    */
    public function otherUserProfile(Request $request)
    {
        $userServices = new UserServices;
        return $userServices->otherUserDetails($request);
    }
    /*
    * Subscribe package
    */
    public function subscribe(Request $request) 
    {
        $userServices = new UserServices;
        return $userServices->packageSubscribe($request);
    }
    /*
    * Subscribe package
    */
    public function subscriptionExpireDate(Request $request) 
    {
        $userServices = new UserServices;
        return $userServices->subscriptionExpireDate($request);
    }
    /*
    * update profile picture
    */
    public function profilePictureUpdate(Request $request) 
    {
        $userServices = new UserServices;
        return $userServices->pictureUpdate($request);
    }
    /*
    * cancel all user related subscriptions
    */
    public function cancelSubscriptions(Request $request) 
    {
        $userServices = new UserServices;
        return $userServices->cancelSubscriptions($request);
    }
    
    
    
}

