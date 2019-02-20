<?php

namespace App\Services;
use App\Models\Category;
use App\Models\PostList;
use App\Models\Token;
use App\Models\LikePost;
use App\Models\CommentPost;
use App\Models\Favourite;
use App\Models\Notification;
use App\Models\User;
use App\Models\ActivePosts;
use App\Models\Follow;
use Response;
use PushNotification;
use Intervention\Image\Facades\Image;
use Request;

class ArtWorkServices
{
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
    * upload new art
    */
    public function uploadPost($post) 
    {
        $new_post                   = new PostList;
        $new_post->post_name        = $post->post_name;
        $new_post->template_id      = $post->template_id;
        $new_post->user_id          = $this->getLogedinUser($post);
        $file                       = $post->file('post_image');
       	$file_name                  = md5(time()) . '.png';
        $uspload_success            = $file->move(public_path('images/posts'), $file_name);
        $url                        = 'images/posts/'.$file_name;
        $thumb_url                  = 'images/posts/thumbnails/' . $file_name;
        $new_image_url              = base_path().'/public/images/posts/thumbnails' . '/' . $file_name;
        $this->resizeImageToMaxWidth(base_path().'/public/images/posts/' . $file_name,360,$new_image_url);
        $new_post->post_image       = $url;
        $new_post->post_thumb_image = $thumb_url;
        $new_post->save();
        return Response::json([
            'result'   => $new_post,
            'error'    => '',
            'status'   => 'SUCCESS'
        ],200);
    }
    /*
    * list art ideas
    */
    public function listArts($art) 
    {
        $user_id = $this->getLogedinUser($art);
        $posts   = ActivePosts::where('template_id',$art->template_id)
//                                ->where('user_id','!=',$user_id)
                                ->orderBy('post_id','DESC')
                                ->paginate(8);
        $result  = [];
        //check posts count
        if(count($posts)>0)
        {
            $a=0;
            foreach ($posts as $post)
            {
                $post_details[$a]['post_id']          = $post->post_id;
                $post_details[$a]['template_id']      = $post->template_id;
                $post_details[$a]['user_id']          = $post->user_id;
                $post_details[$a]['username']         = $post->username;
                $post_details[$a]['post_image']       = $post->post_image;
                $post_details[$a]['post_name']        = $post->post_name;
                $post_details[$a]['post_thumb_image'] = $post->post_thumb_image;
                $post_details[$a]['likes']            = $post->likes;
                $post_details[$a]['comments']         = $post->comments;
                $post_details[$a]['template_name']    = $post->template_name;
                $post_details[$a]['image_png_url']    = $post->image_png_url;
                $post_details[$a]['sub_only']         = $post->sub_only;
                $post_details[$a]['created_at']       = $post->created_at;
                //check user like the post      
                $post_details[$a]['liked']            = LikePost::where('post_id',$post->post_id)->where('user_id',$user_id)->count();
                //is favourite post
                $post_details[$a]['is_favourite']         = Favourite::where('post_id',$post->post_id)->where('user_id',$user_id)->count();
                $a++;
            }
            //pagination details
            $pagination = [
                'total'        => $posts->total(),
                'current_page' => $posts->currentPage(),
                'last_page'    => $posts->lastPage(),
                'per_page'     => $posts->perPage(),
                'prev_page_url'=> $posts->previousPageUrl(),
                'next_page_url'=> $posts->nextPageUrl(),
                'from'         => $posts->firstItem(),
                'to'           => $posts->lastItem(),
            ];
            $result['posts']      = $post_details;
            $result['pagination'] = $pagination;
        }
        return Response::json([
            'result'   => $result,
            'error'    => '',
            'status'   => 'SUCCESS'
        ],200);
    }
    /*
    * get post details
    */
    public function postDetails($post)
    {
        $user_id      = $this->getLogedinUser($post);
        $post_details = ActivePosts::where('post_id',$post->post_id)
                                    ->first();
        if(count($post_details)>0)//check post exist
        {
            $result['post_id']          = $post_details->post_id;
            $result['template_id']      = $post_details->template_id;
            $result['post_name']        = $post_details->post_name;
            $result['post_image']       = $post_details->post_image;
            $result['post_thumb_image'] = $post_details->post_thumb_image;
            $result['created_at']       = $post_details->created_at;
            $result['username']         = $post_details->username;
            $result['user_id']          = $post_details->user_id;
            $result['template_name']    = $post_details->template_name;
            $result['image_png_url']    = $post_details->image_png_url;
            $result['sub_only']         = $post_details->sub_only;
            //get post likes count
            $result['likes']          = $post_details->likes;
            //check user like the post
            $result['liked']          = LikePost::where('post_id',$post->post_id)->where('user_id',$user_id)->count();
            //is favourite post
            $result['is_favourite']   = Favourite::where('post_id',$post->post_id)->where('user_id',$user_id)->count();
            //get comments list
            $result['comments_list']  = CommentPost::join('users','users.user_id','=','comments.user_id')
                                                    ->where('post_id',$post->post_id)
                                                    ->orderBy('comment_id','ASC')
                                                    ->select('users.username','users.profile as photo','comments.*')
                                                    ->get();
            //make notification as read
            if($user_id==$post_details->user_id)
            {
                Notification::where('type',3)->where('post_id',$post_details->post_id)->where('read',0)->update(['read'=>1]);
            }
            return Response::json([
                    'result'   => $result,
                    'error'    => '',
                    'status'   => 'SUCCESS'
            ],200);
        }
        else
        {
            return Response::json([
                    'result'   => '',
                    'error'    => 'Post not exists.',
                    'status'   => 'ERROR'
            ],427);
        }
    }
    /*
    * Add comment
    */
    public function addComment($comment) 
    {
        $user_id              = $this->getLogedinUser($comment);
        $new_comment          = new CommentPost;
        $new_comment->comment = $comment->comment;
        $new_comment->post_id = $comment->post_id;
        $new_comment->user_id = $user_id;
        $new_comment->save();
        //send push notification to the post owner
        $post = PostList::find($comment->post_id);
        if(count($post)>0)
        {
	        if($post->user_id!=$user_id)//check post owner is not adding the comment
	        {
	            //add notification to the post owner
	            $new_notification              = new Notification;
	            $new_notification->post_id     = $comment->post_id;
	            $new_notification->user_id     = $post->user_id;
	            $new_notification->description = $comment->comment;
	            $new_notification->added_by    = $user_id;
	            $new_notification->type        = 3;
	            $new_notification->save();
	            //take user device details
	            $tokens = Token::where('user_id',$user_id)->where('device_push_token','<>','')->get();
	            /*foreach($tokens as $token)
	            {
	                if($token->device_type=="ANDROID")
	                {
	                    $collection = PushNotification::app('appNameAndroid')
	                        ->to($token->device_push_token);
	                    $collection->adapter->setAdapterParameters(['sslverifypeer' => false]);
	                    $message = PushNotification::Message("You have received a comment.", array(
	                            'custom' => array('key' => "comment_on_post", 'id'=>$new_comment->comment_id, 'post_id'=> $new_comment->post_id)
	                    ));
	                    $collection->send($message);
	                }
	                else
	                {
	                    $collection = PushNotification::app('appNameIOS')
	                        ->to($token->device_push_token);
	                    //$collection->adapter->setAdapterParameters(['sslverifypeer' => false]);
	                    $message = PushNotification::Message("You have received a comment.", array(
	                            'custom' => array('key' => "comment_on_post", 'id'=>"$new_comment->comment_id", 'post_id'=> "$new_comment->post_id")
	                    ));
	                    $collection->send($message);
	                }
	            }*/
	        }
	        return $this->postDetails($comment);
    	}
    	else
        {
            return Response::json([
                'result'   => '',
                'error'    => 'Post not exists.',
                'status'   => 'ERROR'
            ],427);
        }
    }
    /*
    * delete comment
    */
    public function deleteComment($comment) 
    {   
        $user_id         = $this->getLogedinUser($comment);
        $comment_details = CommentPost::find($comment->comment_id);
        $post_details = PostList::find($comment_details->post_id);
        if(($comment_details->user_id==$user_id)||($post_details->user_id==$user_id))//check user authorised to delete commment
        {
            CommentPost::where('comment_id',$comment->comment_id)->delete();
            return Response::json([
                'result'   => '',
                'error'    => '',
                'status'   => 'SUCCESS'
            ],200);
        }else
        {
            return Response::json([
                'result'   => '',
                'error'    => 'UnauthorisedAccess',
                'status'   => 'ERROR'
            ],424);
            
        }
    }
    /*
    * Like post
    */
    public function likePost($post) 
    {
        $user_id       = $this->getLogedinUser($post);
        //get post details
        $post_details  = PostList::find($post->post_id);
        //check post exists
        if(count($post_details)>0)
        {
            if($post->like>0)//check like
            {
                //check user already like post
                $liked     = LikePost::where('post_id',$post->post_id)->where('user_id',$user_id)->first();
                if(count($liked)==0)
                {
                    $like          = new LikePost;
                    $like->post_id = $post->post_id;
                    $like->user_id = $user_id;
                    $like->save();
                    if($post_details->user_id!=$user_id)
                    {
                        //add notification to the post owner
                        $notification              = new Notification;
                        $notification->post_id     = $post->post_id;
                        $notification->user_id     = $post_details->user_id;
                        $notification->type        = 2;
                        $notification->description = 'liked your work';
                        $notification->added_by    = $user_id;
                        $notification->save();
                    }
                }
            }
            else
            {
                //delete like 
                LikePost::where('post_id',$post->post_id)->where('user_id',$user_id)->delete();
                //delete pending notifications
                Notification::where('post_id',$post->post_id)->where('added_by',$user_id)->where('type',2)->where('read',0)->delete();
            }
            $likes_count = LikePost::where('post_id',$post->post_id)->count();
            return Response::json([
                'result'   => $likes_count,
                'error'    => '',
                'status'   => 'SUCCESS'
            ],200);
        }
        else
        {
            return Response::json([
                'result'   => '',
                'error'    => 'Post not exists.',
                'status'   => 'ERROR'
            ],427);
        }
        
    }
    /*
    * Check admin login
    */
    public function checkAdmin($details) 
    {
        $user         = Token::where('token',$details->token)->first();
        $user_details = User::find($user->user_id);
        return ($user_details->is_admin>0)?1:0;
    }
    /*
    * post add to favourite list
    */
    public function addToFavourite($details) 
    {
        $user_id = $this->getLogedinUser($details);
        //check post exists
        $post    = PostList::find($details->post_id);
        if(count($post)>0)
        {
            //check is add to favourite
            if($details->favourite>0)
            {
                $is_fvorite =  Favourite::where('post_id',$details->post_id)->where('user_id',$user_id)->first();
                //check already add to favourite
                if(count($is_fvorite)==0)
                {
                   $new_favourite          = new Favourite;
                   $new_favourite->post_id = $details->post_id;
                   $new_favourite->user_id = $user_id;
                   $new_favourite->save();
                }
            }
            else
            {
                Favourite::where('post_id',$details->post_id)->where('user_id',$user_id)->delete();
            }
            return Response::json([
                'result'   => '',
                'error'    => '',
                'status'   => 'SUCCESS'
            ],200);
        }
        else
        {
            return Response::json([
                'result'   => '',
                'error'    => 'Post not exists.',
                'status'   => 'ERROR'
            ],427);
        }
    }
    /*
    * notification unread likes listing
    */
    public function listLikes($details) 
    {
        $user_id  = $this->getLogedinUser($details);
        $likes    = Notification::join('users','users.user_id','=','notifications.added_by')
                                ->join('posts','posts.post_id','=','notifications.post_id')
                                ->where('notifications.user_id',$user_id)
                                // ->where('read',0)
                                ->where('type',2)
                                ->orderBy('notifications.created_at','DESC')
                                ->limit(20)
                                ->select('notification_id','description','users.user_id','users.username','posts.post_image','posts.post_thumb_image','posts.post_id','posts.post_name','read')
                                ->get();
        
        return Response::json([
            'result'   => $likes,
            'error'    => '',
            'status'   => 'SUCCESS'
        ],200);
    }
    /*
    *mark likes notification as read
    */
    public function readLikes($details) 
    {
        $user_id  = $this->getLogedinUser($details);
        $likes    = Notification::where('user_id',$user_id)->where('type',2)->where('read',0)->update(['read'=>1]);
        return Response::json([
            'result'   => '',
            'error'    => '',
            'status'   => 'SUCCESS'
        ],200);
    }
    /*
    * notification Count
    */
    public function notificationCount($details) 
    {
        $user_id  = $this->getLogedinUser($details);
        //likes count
        $result['likes']         = Notification::where('user_id',$user_id)
                                                ->where('read',0)
                                                ->where('type',2)
                                                ->count();
        //comments
        $result['comments']      = Notification::where('user_id',$user_id)
                                                ->where('read',0)
                                                ->where('type',3)
                                                ->count();
        //notifications cont 
        $result['notifications'] = Notification::where('user_id',$user_id)
                                                ->where('read',0)
                                                ->where('type',1)
                                                ->count();
        return Response::json([
            'result'   => $result,
            'error'    => '',
            'status'   => 'SUCCESS'
        ],200);
    }
    /*
     * resize uploaded image
     */
    public function resizeImageToMaxWidth($imagePath, $maxWidth = 200, $newImagePath)
	{
		$image = Image::make($imagePath)->orientate();
        
		if ( ! $newImagePath) $newImagePath = $imagePath;

		$currentWidth = $image->width();
        
		if ($currentWidth > $maxWidth)
		{
			$image->resize($maxWidth, null, function($constraint) {
				$constraint->aspectRatio();
			});
			$image->save($newImagePath);
		}
		else
		{
			$image->save($newImagePath);
		}

		return true;
	}
    /*
    * list new comments
    */
    public function newComments($details)
    {
        $user_id  = $this->getLogedinUser($details);
        //unread comments
        $comments = Notification::join('users','users.user_id','=','notifications.added_by')
                                ->join('posts','posts.post_id','=','notifications.post_id')
                                ->where('notifications.user_id',$user_id)
                                // ->where('read',0)
                                ->where('type',3)
                                ->orderBy('notifications.created_at','DESC')
                                ->limit(20)
                                ->select('notification_id','description','users.user_id','users.username','posts.post_image','posts.post_thumb_image','posts.post_id','posts.post_name','read')
                                ->get();
        return Response::json([
            'result' => $comments,
            'error'  => '',
            'status' => 'SUCCESS'
        ],200);
    }
    /*
    * mark comment as read 
    */
    public function readComments($details)
    {
        $user_id  = $this->getLogedinUser($details);
        $likes    = Notification::where('user_id',$user_id)->where('type',3)->where('read',0)->update(['read'=>1]);
        return Response::json([
            'result'   => '',
            'error'    => '',
            'status'   => 'SUCCESS'
        ],200);
    }
    /*
    * list unread following details 
    */
    public function listFollowings($details) 
    {
        $user_id    = $this->getLogedinUser($details);
        $followings = Notification::join('users','users.user_id','=','notifications.added_by')
                                    ->where('notifications.user_id',$user_id)
                                    ->where('type',1)
                                    // ->where('read',0)
                                    ->orderBy('notifications.created_at','DESC')
                                    ->limit(20)
                                    ->select('notification_id','description','users.user_id','username','profile as photo','read')
                                    ->get();
        return Response::json([
            'result'   => $followings,
            'error'    => '',
            'status'   => 'SUCCESS'
        ],200);
    }
    /*
    * Mark new following as read 
    */
    public function readFollowings($details)
    {
        $user_id    = $this->getLogedinUser($details);
        Notification::where('user_id',$user_id)->where('type',1)->where('read',0)->update(['read'=>1]);
        return Response::json([
            'result' =>'',
            'error'  =>'',
            'status' =>'SUCCESS'
        ],200);
    }
    /*
    * List user favourite posts
    */
    public function userFavourites($details)
    {
        $user_id = $this->getLogedinUser($details);
        $posts   = Favourite::join('active_posts','active_posts.post_id','=','favourites.post_id')
                            ->where('favourites.user_id',$user_id)
                            ->select('active_posts.post_id','active_posts.user_id','active_posts.post_image','active_posts.post_name','active_posts.post_thumb_image','likes','comments','active_posts.template_id','active_posts.created_at','active_posts.username','active_posts.sub_only','active_posts.template_name','active_posts.image_png_url')
                            ->orderBy('favourites.created_at','DESC')
                            ->paginate(4);
        $result  = [];
        if(count($posts)>0)
        {
            $a=0;
            foreach ($posts as $post)
            {
                $post_details[$a]['post_id']          = $post->post_id;
                $post_details[$a]['template_id']      = $post->template_id;
                $post_details[$a]['user_id']          = $post->user_id;
                $post_details[$a]['post_image']       = $post->post_image;
                $post_details[$a]['post_name']       = $post->post_name;
                $post_details[$a]['post_thumb_image'] = $post->post_thumb_image;
                $post_details[$a]['likes']            = $post->likes;
                $post_details[$a]['comments']         = $post->comments;
                $post_details[$a]['template_name']    = $post->template_name;
                $post_details[$a]['image_png_url']    = $post->image_png_url;
                $post_details[$a]['sub_only']         = $post->sub_only;
                $post_details[$a]['username']         = $post->username;
                $post_details[$a]['created_at']       = $post->created_at;
                //check user like the post      
                $post_details[$a]['liked']            = LikePost::where('post_id',$post->post_id)->where('user_id',$user_id)->count();
                $a++;
            }
            //pagination details
            $pagination = [
                'total'        => $posts->total(),
                'current_page' => $posts->currentPage(),
                'last_page'    => $posts->lastPage(),
                'per_page'     => $posts->perPage(),
                'prev_page_url'=> $posts->previousPageUrl(),
                'next_page_url'=> $posts->nextPageUrl(),
                'from'         => $posts->firstItem(),
                'to'           => $posts->lastItem(),
            ];
            $result['posts']      = $post_details;
            $result['pagination'] = $pagination;
        }
        
        return Response::json([
            'result' => $result,
            'error'  => '',
            'status' => 'SUCCESS'
        ],200);
    }
    /*
    * Delete selected art work, comments,likes,favourite,notifications delete
    */
    public function deletePost($details)
    {
        $user_id = $this->getLogedinUser($details);
        //check post owner login
        $post    = PostList::find($details->post_id);
        if(count($post)<1||$post->user_id!=$user_id)
        {
            return Response::json([
                'result' => '',
                'error'  => 'UnauthorisedAccess',
                'status' => 'ERROR'
            ],424);
        }
        else
        {
            //delete post related comments
            CommentPost::where('post_id',$details->post_id)->delete();
            //delete likes related to post ID
            LikePost::where('post_id',$details->post_id)->delete();
            //delete favourites
            Favourite::where('post_id',$details->post_id)->delete();
            //delete unread notifications related to the post
            Notification::where('post_id',$details->post_id)->where('read',0)->delete();
            //delete images
            if (file_exists(public_path('images/posts/'.$post->post_image))) 
            {
                unlink(public_path('images/posts/'.$post->post_image));
            }
            //delete thumb images
            if (file_exists(public_path('images/posts/thumbnails/'.$post->post_image))) 
            {
                unlink(public_path('images/posts/thumbnails/'.$post->post_image));
            }
            //delete post details
            PostList::where('post_id',$details->post_id)->delete();
            
            return Response::json([
                'result' => '',
                'error'  => '',
                'status' => 'SUCCESS'
            ],200);
        }
    }
    /*
    * inspire  
    */
    public function inspire($details)
    {
        if($details->token!='')
        {
            $user_id = $this->getLogedinUser($details);
        }
        $posts   = ActivePosts::orderBy('likes','DESC')->paginate(16);
        $result  = [];
        if(count($posts)>0)
        {
            $a=0;
            foreach ($posts as $post)
            {
                $post_details[$a]['post_id']          = $post->post_id;
                $post_details[$a]['template_id']      = $post->template_id;
                $post_details[$a]['post_name']        = $post->post_name;
                $post_details[$a]['post_image']       = $post->post_image;
                $post_details[$a]['post_thumb_image'] = $post->post_thumb_image;
                $post_details[$a]['username']         = $post->username;
                $post_details[$a]['user_id']          = $post->user_id;
                $post_details[$a]['likes']            = $post->likes;
                $post_details[$a]['comments']         = $post->comments;
                $post_details[$a]['created_at']       = $post->created_at;
                $post_details[$a]['template_name']    = $post->template_name;
                $post_details[$a]['image_png_url']    = $post->image_png_url;
                $post_details[$a]['sub_only']         = $post->sub_only;
                if($details->token!='')
                {
                //check login user favourite the post
                $post_details[$a]['is_favourite'] = Favourite::where('post_id',$post->post_id)->where('user_id',$user_id)->count();
                //check login user liked the post
                $post_details[$a]['liked']        = LikePost::where('post_id',$post->post_id)->where('user_id',$user_id)->count();
                }
                else
                {
                    $post_details[$a]['is_favourite'] = 0;
                    $post_details[$a]['liked']        = 0;
                }
                $a++;
            }
            //pagination details
            $pagination = [
                'total'        => $posts->total(),
                'current_page' => $posts->currentPage(),
                'last_page'    => $posts->lastPage(),
                'per_page'     => $posts->perPage(),
                'prev_page_url'=> $posts->previousPageUrl(),
                'next_page_url'=> $posts->nextPageUrl(),
                'from'         => $posts->firstItem(),
                'to'           => $posts->lastItem(),
            ];
            $result['posts']      = $post_details;
            $result['pagination'] = $pagination;
        }
        return Response::json([
            'result' => $result,
            'error'  => '',
            'status' => 'SUCCESS'
        ],200);
        
    }
    /*
    * new posts  
    */
    public function newPosts($details)
    {
        if($details->token!='')
        {
            $user_id  = $this->getLogedinUser($details);
            $user     = User::find($user_id);
            $new_time = date('d-m-Y H:i:s');
            if($details->last_seen!='')
            {
                $last_seen       = date('Y-m-d H:i:s', strtotime($details->last_seen));
                $user->last_seen = $new_time;
                $user->save();
            }
            else
            {
                $last_seen = $user->last_seen;
            }
        }
//        $posts   = ActivePosts::where('created_at','>=',$last_seen)->orderBy('created_at','DESC')->get();
        $posts   = ActivePosts::orderBy('created_at','DESC')->paginate(16);
        $result  = [];
        if(count($posts)>0)
        {
            $a=0;
            foreach ($posts as $post)
            {
                $post_details[$a]['post_id']          = $post->post_id;
                $post_details[$a]['user_id']          = $post->user_id;
                $post_details[$a]['username']         = $post->username;
                $post_details[$a]['template_id']      = $post->template_id;
                $post_details[$a]['post_image']       = $post->post_image;
                $post_details[$a]['post_name']        = $post->post_name;
                $post_details[$a]['post_thumb_image'] = $post->post_thumb_image;
                $post_details[$a]['likes']            = $post->likes;
                $post_details[$a]['comments']         = $post->comments;
                $post_details[$a]['created_at']       = $post->created_at;
                $post_details[$a]['template_name']    = $post->template_name;
                $post_details[$a]['image_png_url']    = $post->image_png_url;
                $post_details[$a]['sub_only']         = $post->sub_only;
                if($details->token!='')
                {
                    //check login user liked the post
                    $post_details[$a]['liked']        = LikePost::where('post_id',$post->post_id)->where('user_id',$user_id)->count();
                }
                else
                {
                    $post_details[$a]['liked']        = 0;
                }
                $a++;
            }
            //pagination details
            $pagination = [
                'total'        => $posts->total(),
                'current_page' => $posts->currentPage(),
                'last_page'    => $posts->lastPage(),
                'per_page'     => $posts->perPage(),
                'prev_page_url'=> $posts->previousPageUrl(),
                'next_page_url'=> $posts->nextPageUrl(),
                'from'         => $posts->firstItem(),
                'to'           => $posts->lastItem(),
            ];
            $result['posts']      = $post_details;
            $result['pagination'] = $pagination;
        }
        return Response::json([
            'result' => $result,
            'error'  => '',
            'status' => 'SUCCESS'
        ],200);
        
    }
    /*
    * following users posts 
    */
    public function timeline($details)
    {
        $user_id           = $this->getLogedinUser($details);
        //get user following users
        $followers         = Follow::where('user_id',$user_id)->get();
        $followers_list_ar = [];
        //check followers count
        if(count($followers)>0)
        {
            $followers_list    = implode(',', array_column($followers->toArray(), 'following_id'));
            $followers_list_ar = explode(',',$followers_list);
        }
        $posts     = ActivePosts::whereIn('user_id',$followers_list_ar)->orwhere('user_id',$user_id)->orderBy('created_at','DESC')->paginate(16);
        $result    = [];
        //check posts count
        if(count($posts)>0)
        {
            $a=0;
            foreach ($posts as $post)
            {
                $post_details[$a]['post_id']          = $post->post_id;
                $post_details[$a]['template_id']      = $post->template_id;
                $post_details[$a]['post_name']        = $post->post_name;
                $post_details[$a]['post_image']       = $post->post_image;
                $post_details[$a]['post_thumb_image'] = $post->post_thumb_image;
                $post_details[$a]['username']         = $post->username;
                $post_details[$a]['user_id']          = $post->user_id;
                $post_details[$a]['likes']            = $post->likes;
                $post_details[$a]['comments']         = $post->comments;
                $post_details[$a]['created_at']       = $post->created_at;
                $post_details[$a]['template_name']    = $post->template_name;
                $post_details[$a]['image_png_url']    = $post->image_png_url;
                $post_details[$a]['sub_only']         = $post->sub_only;
                //check login user favourite the post
                $post_details[$a]['is_favourite']     = Favourite::where('post_id',$post->post_id)->where('user_id',$user_id)->count();
                //check login user liked the post    
                $post_details[$a]['liked']            = LikePost::where('post_id',$post->post_id)->where('user_id',$user_id)->count();
                $a++;
            }
            //pagination details
            $pagination = [
                'total'        => $posts->total(),
                'current_page' => $posts->currentPage(),
                'last_page'    => $posts->lastPage(),
                'per_page'     => $posts->perPage(),
                'prev_page_url'=> $posts->previousPageUrl(),
                'next_page_url'=> $posts->nextPageUrl(),
                'from'         => $posts->firstItem(),
                'to'           => $posts->lastItem(),
            ];
            $result['posts']      = $post_details;
            $result['pagination'] = $pagination;
        }
        return Response::json([
            'result' => $result,
            'error'  => '',
            'status' => 'SUCCESS'
        ],200);
        
    }
}
