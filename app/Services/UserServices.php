<?php

namespace App\Services;

use App\Models\User;
use App\Models\PostList;
use App\Models\ActivePosts;
use App\Models\Token;
use App\Models\Follow;
use App\Models\Notification;
use App\Models\Favourite;
use App\Models\LikePost;
use App\Models\Subscription;
use Hash;
use Auth;
use Response;
use Validator;
use DB;
use Request;

class UserServices
{
    /*
    * Get users list
    */
    public function getUsers()
    {
       return User::where('is_admin',0)->get();
    }
    /*
    * blocl/unblock selected user
    */
    public function blockUser($user)
    {
        $user_details             = User::find($user);
        $user_details->is_blocked = ($user_details->is_blocked>0)?0:1;
        $user_details->save();
        return 1;       
    }
    /*
    * Get selected user details
    */
    public function getUserDetails($id)
    {
       $user['details'] = User::find($id);
       $user['posts']   = PostList::where('user_id',$id)->count();
       return $user;
    }
    /*
    * Get selected user details
    */
    public function getLogedinUser($details)
    {
        if($details->token!=''){
            $token = $details->token;
        }
        else
        {
            $token = Request::header('TOKEN');
        }
        $user = Token::where('token',$token)->first();
        return $user->user_id;
    }
    /*
    * Get selected user details
    */
    public function checkUserExist($fiels,$value)
    {
        return  User::where($fiels,$value)->first();
    }
    /*
    * Get selected user details
    */
    public function registerUser($request)
    {
        $user                = new User;
        $user->username      = $request->username;
        $user->email         = $request->email;
        $user->password      = Hash::make($request->password);
        $user->payload_token = md5(time());
        $user->is_admin      = 0;
        $user->save();
        //add user token details
        $newToken                 = str_random(32);
        $token                    = new Token;
        $token->device_id         = $request->device_id;
        $token->device_type       = $request->device_type;
        $token->device_push_token = $request->device_push_token;
        $token->token             = $newToken;
        $token->user_id           = $user->user_id;
        $token->save();
        //response details
        return $result = [
            'user_id'        => $user->user_id,
            'username'       => $user->username,
            'token'          => $newToken,
            'email'          => $user->email,
            'payload_token'  => $user->payload_token,
            'package_expire' => '',
            'is_expired'     => 1,
            'photo'          => url('images/profile.jpg'),
            'is_admin'       => $user->is_admin,
        ];
    }
    /*
    * remove user token
    */
    public function userLogout($request)
    {
        Token::where('token',$request->token)->delete();
        return Response::json([
            'result'   => '',
            'error'    => '',
            'status'   => 'SUCCESS'
        ],200);
    }
    /*
    * create new token for user
    */
    public function userLogin($request)
    {
        //check user exist and not a blocked user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_blocked'=>0])) 
        {
            $user     = Auth::user();
            //create a token and update/insert token table and send the tocken to app
            $newToken = str_random(32);
            // check token has record for the device and user
            $token    = Token::where('device_id',$request->device_id)
                                ->where(function($query) use($user){
                                    $query->where('user_id',$user->user_id);
                                })->first();
            //check user previously login
            if(count($token)>0)
            {
                $token->token             = $newToken;
                $token->device_push_token = $request->device_push_token;
                $token->save();
            }
            else
            {
                $token                    = new Token;
                $token->user_id           = $user->user_id;
                $token->token             = $newToken;
                $token->device_push_token = $request->device_push_token;
                $token->device_type       = $request->device_type;
                $token->device_id         = $request->device_id;
                $token->save();
            }
            //check subscription expired
            if($user->package_expire_date>=date('Y-m-d H:i'))
            {
                $is_expired = 0;
            }
            else
            {
                $is_expired = 1;
            }
            $result=[
                'user_id'        => $user->user_id,
                'username'       => $user->username,
                'email'          => $user->email,
                'token'          => $newToken,
                'payload_token'  => $user->payload_token,
                'package_expire' => ($user->package_expire_date!='')?date("d-m-Y H:i:s", strtotime($user->package_expire_date)):'',
                'expire_date'    => ($user->package_expire_date!='')?strtotime($user->package_expire_date):0,
                'is_expired'     => $is_expired,
                'photo'          => ($user->profile!='')?url($user->profile):url('images/profile.jpg'),
                'is_admin'       => $user->is_admin,
            ];
            $result['is_monthly_enable'] = 0;
            $result['is_yearly_enable']  = 0;
            if($user->package_expire_date!='')
            {
                //get user related munthy active subscriptions
                $monthy_packages =   Subscription::where('user_id',$user->user_id)->where('type',1)->whereDate('end_date','>=',date('Y-m-d H:i'))->count();
                //get user related yearly active subscriptions
                $yearly_packages =  Subscription::where('user_id',$user->user_id)->where('type',2)->whereDate('end_date','>=',date('Y-m-d H:i'))->count();
                $result['is_monthly_enable'] = ($monthy_packages>0)?1:0;
                $result['is_yearly_enable']  = ($yearly_packages>0)?1:0;
            }
            return Response::json([
                'result'   => $result,
                'error'    => '',
                'status'   => 'SUCCESS'
            ],200);
        }
        else
        {
            //check user is block
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_blocked'=>1]))
            {
                return Response::json([
                    'result'   => '',
                    'error'    => 'UserBlocked',
                    'status'   => 'ERROR'
                ],410);
            }
            else
            {
                return Response::json([
                    'result'   => '',
                    'error'    => 'InvalidLogin',
                    'status'   => 'ERROR'
                ],402);
            } 
        }
    }
    /*
     * get profile details
    */
    public function userProfile($user) 
    {
        //get login user details
        $user_id    = $this->getLogedinUser($user);
        $login_user = User::find($user_id);
        //get following count
        $followings = Follow::where('user_id',$user_id)->count();
        $followers  = Follow::where('following_id',$user_id)->count();
        //take user uploaded posts details
        $posts      = ActivePosts::where('user_id',$user_id)
                                   ->select('post_id','post_image','post_name','post_thumb_image','likes','comments','template_id','template_name','image_png_url','thumb_image','sub_only','username','created_at')
                                   ->orderBy('post_id','DESC')
                                   ->get();
        $post_details = [];
        //check user liked the post
        if(count($posts)>0)
        {
            $a=0;
            foreach ($posts as $post)
            {
                $post_details[$a]          = $post;
                //check login user like post
                $post_details[$a]['liked'] = LikePost::where('user_id',$user_id)->where('post_id',$post->post_id)->count();
                $a++;
            }
        }
        $result     = [
            'user_id'        => $login_user->user_id,
            'username'       => $login_user->username,
            'email'          => $login_user->email,
            'token'          => $user->token,
            'photo'          => ($login_user->profile!='')?url($login_user->profile):url('images/profile.jpg'),
            'payload_token'  => $login_user->payload_token,
            'package_expire' => ($login_user->package_expire_date!='')?date("d-m-Y H:i:s", strtotime($login_user->package_expire_date)):'',
            'is_admin'       => $login_user->is_admin,
            'followings'     => $followings,
            'followers'      => $followers,
            'posts'          => $post_details
        ];
        return Response::json([
            'result'   => $result,
            'error'    => '',
            'status'   => 'SUCCESS'
        ],200);
    }
    /*
    * update user profile info
    */
    public function updateProfile($user) 
    {
        //get login user details
        $user_id    = $this->getLogedinUser($user);
        $login_user = User::find($user_id);
        //check username used by other user
        $username   = User::where('user_id','!=',$user_id)->where('username','=',$user->username)->count();
        if($username>0)
        {
            return Response::json([
                'result'  => '',
                'error'   => 'Username already exists.',
                'status'  => 'ERROR'
            ],456);
        }
        //check email already exist
        $email = User::where('user_id','!=',$user_id)->where('email','=',$user->email)->count();
        if($email>0)
        {
            return Response::json([
                'result'  => '',
                'error'   => 'Email address already exists.',
                'status'  => 'ERROR'
            ],406);
        }
        //check password matching
        if(!Hash::check($user->current_password,$login_user->password))
        {
            return Response::json([
                'result'   => '',
                'error'    => 'Invalid password.',
                'status'   => 'ERROR'
            ],417);
        }
        //update user info
        $login_user->email    = $user->email;
        $login_user->username = $user->username;
        if($user->new_password!='')
        {
            $login_user->password = Hash::make($user->new_password);
        }
        $login_user->save();
        $result = [
            'user_id'        => $login_user->user_id,
            'username'       => $login_user->username,
            'email'          => $login_user->email,
            'token'          => $user->token,
            'photo'          => ($login_user->profile!='')?url($login_user->profile):url('images/profile.jpg'),
            'payload_token'  => $login_user->payload_token,
            'package_expire' => ($login_user->package_expire_date!='')?$login_user->package_expire_date:'',
            'is_admin'       => $login_user->is_admin,
        ];
        return Response::json([
            'result'   => $result,
            'error'    => '',
            'status'   => 'SUCCESS'
        ],200);
    }
    /*
    * update profile picture
    */
    public function pictureUpdate($param) 
    {
        //validate file type
        $rules = [
            'picture' => 'mimes:png,jpg,jpeg'
        ];
        $validator = Validator::make($param->all(),$rules );
        if ($validator->fails()) 
        {
            return Response::json([
                'result'  => '',
                'error'   => 'InvalidFileType',
                'status'  => 'ERROR'
            ],425);
        }
        //get login user details
        $user_id         = $this->getLogedinUser($param);
        $user            = User::find($user_id);
        $file            = $param->file('photo');
        $file_name       = md5(time()) . '.png';
        $uspload_success = $file->move(public_path('images/profile'), $file_name);
        $url             = 'images/profile/'.$file_name;
        //unset current picture
        if($user->profile!=''&&$uspload_success)
        {
            unlink(public_path($user->profile));
        }
        $user->profile = $url;
        $user->save();
        return Response::json([
            'result' => ['photo' => url($user->profile)],
            'error'  => '',
            'status' => 'SUCCESS'
        ],200);
       
    }
    /*
    * follow user
    */
    public function followUser($details) 
    {
        $user_id   = $this->getLogedinUser($details);
        if($details->is_follow==0)
        {
            $is_follow = Follow::where('user_id',$user_id)->where('following_id',$details->follower_id)->first();
            //check already following
            if(count($is_follow)==0)
            {
                //add follow details
                $new_follow                    = new Follow;
                $new_follow->user_id           = $user_id;
                $new_follow->following_id      = $details->follower_id;
                $new_follow->save();
                //add notification
                $new_notification              = new Notification;
                $new_notification->user_id     = $details->follower_id;
                $new_notification->description = 'is following you';
                $new_notification->type        = 1;
                $new_notification->added_by    = $user_id;
                $new_notification->save();
            }
        }
        else
        {
            Follow::where('user_id',$user_id)->where('following_id',$details->follower_id)->delete();
            Notification::where('added_by',$user_id)->where('user_id',$details->follower_id)->where('type',1)->delete();
            return Response::json([
                'result' => '',
                'error'  => '',
                'status' => 'SUCCESS'
            ],200);
        }
        
        return Response::json([
            'result' => '',
            'error'  => '',
            'status' => 'SUCCESS'
        ],200);
    }
    /*
    * unfollowUser
    */
    public function unfollowUser($details)
    {
        $user_id   = $this->getLogedinUser($details);
        Follow::where('user_id',$user_id)->where('following_id',$details->follower_id)->delete();
        Notification::where('added_by',$user_id)->where('user_id',$details->follower_id)->where('type',1)->delete();
        return Response::json([
            'result' => '',
            'error'  => '',
            'status' => 'SUCCESS'
        ],200);
    }
    /*
    * list user followings
    */
    public function listFollowings($details)
    {
        $login_id = $this->getLogedinUser($details);
        if(isset($details->other_user_id)&&$details->other_user_id>0)
        {
            $user_id      = $details->other_user_id;
        }else{
             $user_id     = $login_id;
        }
        $followings = Follow::join('users','users.user_id','=','follow.following_id')
                            ->where('follow.user_id',$user_id)
                            ->select(DB::raw('users.user_id,username,profile as photo'))
                            ->get();
                            //check followers exist
        $follower_details = [];
        if(count($followings)>0)
        {
            $a=0;
            foreach ($followings as $following)
            {
                $follower_details[$a]['user_id']   = $following->user_id;
                $follower_details[$a]['photo']     = $following->photo;
                $follower_details[$a]['username']  = $following->username;
                //check user folllowing status
                $follower_details[$a]['is_follow'] = Follow::where('follow.user_id',$login_id)
                                                            ->where('follow.following_id',$following->user_id)
                                                            ->count();
                $a++;
            }
        }
        return Response::json([
            'result' => $follower_details,
            'error'  => '',
            'status' => 'SUCCESS'
        ],200);
    }
    /*
    * list user followings
    */
    public function listFollowers($details)
    {
        $login_id     = $this->getLogedinUser($details);
        if(isset($details->other_user_id)&&$details->other_user_id>0)
        {
            $user_id     = $details->other_user_id;
        }else{
            $user_id     = $login_id;
        }
        
        $followings       = Follow::join('users','users.user_id','=','follow.user_id')
                                    ->where('follow.following_id',$user_id)
                                    ->select('users.user_id','username','profile as photo')
                                    ->get();
        $follower_details =[];
        //check followers exist
        if(count($followings)>0)
        {
            $a=0;
            foreach ($followings as $following)
            {
                $follower_details[$a]['user_id']   = $following->user_id;
                $follower_details[$a]['photo']     = $following->photo;
                $follower_details[$a]['username']  = $following->username;
                //check user folllowing status
                $follower_details[$a]['is_follow'] = Follow::where('follow.user_id',$login_id)
                                                            ->where('follow.following_id',$following->user_id)
                                                            ->count();
                $a++;
            }
        }
        return Response::json([
            'result' => $follower_details,
            'error'  => '',
            'status' => 'SUCCESS'
        ],200);
    }
    /*
    *Search users 
    */
    public function searchUsers($details)
    {
        $user_id      = $this->getLogedinUser($details);
        $search_name  = $details->key;
        $search_users = User::where('username','like',"$search_name%")
                            ->where('user_id','!=',$user_id)
                            ->where('is_admin',0)
                            ->select('user_id','username','profile as photo')
                            ->get();
        $result       = [];
        $follow       = [];
        //check results count
        if(count($search_users)>0)
        {
            //get login user following users
            $followings = Follow::where('user_id',$user_id)->select('following_id')->get();
            if(count($followings)>0)
            {
                $following_list = implode(',', array_column($followings->toArray(), 'following_id'));
                $follow         = explode(',',$following_list);
            }
            $a=0;
            foreach ($search_users as $search_user)
            {
                $result[$a]                  = $search_user;
                $result[$a]['is_follow']     = 0;
                if(in_array($search_user->user_id, $follow))
                {
                    $result[$a]['is_follow'] = 1;
                }
                $a++;
            }
        }
        return Response::json([
            'result' => $result,
            'error'  => '',
            'status' => 'SUCCESS'
        ],200);
        
    }
    /*
    * take selected user details
    */
    public function otherUserDetails($details)
    {
        $user_id      = $details->friend_id;
        $login_user   = $this->getLogedinUser($details);
        $user_details = User::find($user_id);
        if(count($user_details)>0)
        {
            //user following details
            $followings   = Follow::where('user_id',$user_id)->count();
            $followers    = Follow::where('following_id',$user_id)->count();
            //check user follow by login user
            $is_follow    = Follow::where('user_id',$login_user)->where('following_id',$user_id)->count();
            //take selected user uploaded posts
            $posts        = ActivePosts::where('user_id',$user_id)
                                        ->select('post_id','user_id','post_image','post_name','post_thumb_image','comments','likes','template_id','template_name','image_png_url','thumb_image','sub_only','username','created_at')
                                        ->orderBy('post_id','DESC') 
                                        ->get();
            $post_details = [];
            //check user liked the post
            if(count($posts)>0)
            {
                $a=0;
                foreach ($posts as $post)
                {
                    $post_details[$a]          = $post;
                    //check login user like post
                    $post_details[$a]['liked'] = LikePost::where('user_id',$login_user)->where('post_id',$post->post_id)->count();
                    $a++;
                }
            }
            $result     = [
                'user_id'        => $user_details->user_id,
                'username'       => $user_details->username,
                'photo'          => ($user_details->profile!='')?url($user_details->profile):url('images/profile.jpg'),
                'followings'     => $followings,
                'followers'      => $followers,
                'is_follow'      => $is_follow,
                'posts'          => $post_details
            ];
            return Response::json([
                'result' => $result,
                'error'  => '',
                'status' => 'SUCCESS'
            ],200);
        }
        else 
        {
            return Response::json([
                'result' => '',
                'error'  => 'NoUserFound',
                'status' => 'ERROR'
            ],404);
        }
    }
    /*
    * package Subscribe
    */
    public function packageSubscribe($details)
    {
        $user_id = $this->getLogedinUser($details);
        //add subscription package details
        $package             = new Subscription;
        $package->type       = $details->type;
        $package->user_id    = $user_id;
        $package->start_date = date('Y-m-d H:i:s');
        $package->end_date   = ($details->type==1)?date('Y-m-d H:i:s', strtotime("+1 month")):date('Y-m-d H:i:s', strtotime('+1 year'));
        $package->save();
        //add subsrciption expire date to user table
        $user = $this->checkUserExist('user_id',$user_id);
        if($user->package_expire_date!='')
        {
           $expire_date = ($details->type==1)?date('Y-m-d H:i:s', strtotime("+1 month", strtotime($user->package_expire_date))):date('Y-m-d H:i:s', strtotime('+1 year',  strtotime($user->package_expire_date)));
        }
        else
        {
           $expire_date = ($details->type==1)?date('Y-m-d H:i:s', strtotime("+1 month")):date('Y-m-d H:i:s', strtotime('+1 year'));
        }
        //update user package expire date
        User::where('user_id',$user_id)->update(['package_expire_date'=>$expire_date]);
        $result['package_expire_date'] = date("d-m-Y H:i:s", strtotime($expire_date));
        $result['expire_date']         = strtotime($expire_date);
        $result['is_expired']          = 0;
        //get user related munthy active subscriptions
        $monthy_packages =   Subscription::where('user_id',$user_id)->where('type',1)->whereDate('end_date','>=',date('Y-m-d H:i'))->count();
        //get user related yearly active subscriptions
        $yearly_packages =  Subscription::where('user_id',$user_id)->where('type',2)->whereDate('end_date','>=',date('Y-m-d H:i'))->count();
        $result['is_monthly_enable'] = ($monthy_packages>0)?1:0;
        $result['is_yearly_enable'] = ($yearly_packages>0)?1:0;
        return Response::json([
            'result' => $result,
            'error'  => '',
            'status' => 'SUCCESS'
        ],200);
    }
    /*
    * get user sebscription expire date
    */
    public function subscriptionExpireDate($details) 
    {
        $user_id    = $this->getLogedinUser($details);
        $user       = User::find($user_id);
        $is_expired = 1;
        //check subscription expired
        if($user->package_expire_date>=date('Y-m-d H:i'))
        {
            $is_expired = 0;
        }
        $result = [
            'package_expire' => ($user->package_expire_date!='')? date("d-m-Y H:i:s", strtotime($user->package_expire_date)):'',
            'expire_date'    => ($user->package_expire_date!='')? strtotime($user->package_expire_date):0,
            'is_expired'     => $is_expired,
        ];
        $result['is_monthly_enable'] = 0;
        $result['is_yearly_enable']  = 0;
        if($user->package_expire_date!='')
        {
            //get user related munthy active subscriptions
            $monthy_packages =   Subscription::where('user_id',$user_id)->where('type',1)->whereDate('end_date','>=',date('Y-m-d H:i'))->count();
            //get user related yearly active subscriptions
            $yearly_packages =  Subscription::where('user_id',$user_id)->where('type',2)->whereDate('end_date','>=',date('Y-m-d H:i'))->count();
            $result['is_monthly_enable'] = ($monthy_packages>0)?1:0;
            $result['is_yearly_enable'] = ($yearly_packages>0)?1:0;
        }
        return Response::json([
            'result' => $result,
            'error'  => '',
            'status' => 'SUCCESS'
        ],200);
    }
    /*
    * cancel all the subscriptions user did
    */
    public function cancelSubscriptions($details)
    {
        $user_id                     = $this->getLogedinUser($details);
        $user                        = User::find($user_id);
        $user->package_expire_date   = null;
        $user->save();
        Subscription::where('user_id',$user_id)->delete();
        $result['expire_date']       = 0;
        $result['is_expired']        = 1;
        $result['is_monthly_enable'] = 0;
        $result['is_yearly_enable']  = 0;
        return Response::json([
            'result' => $result,
            'error'  => '',
            'status' => 'SUCCESS'
        ],200);
    }

}
