<?php

namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use Response;
use App\Services\TemplateServices;
use App\Services\ArtWorkServices;
use Imagick;
class ArtWorkController extends Controller
{
    /*
    * list all the categories with its templates
    */
    public function listCategories(Request $request) 
    {
        $templateServices = new TemplateServices;
        $categories       = $templateServices->getCategories();
        $result           = [];
        //check categories exist
        if(count($categories)>0)
        {
            $a = 0;
            //get each category details
            foreach ($categories as $category)
            { 
                $result[$a]['category_id']    = $category->category_id;
                $result[$a]['category_name']  = $category->category_name;
                //get each category related templates
                $result[$a]['templates']    = $templateServices->getTemplates($category->category_id);
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
    * get selected category related templates
    */
    public function listTemplates(Request $request) 
    {
        $templateServices = new TemplateServices;
        $result           = $templateServices->getTemplates($request->category_id);
        return Response::json([
            'result' => $result,
            'error'  => '',
            'status' => 'SUCCESS'
        ],200);
    }
    /*
    * get selected category related templates
    */
    public function listTestTemplates(Request $request) 
    {
        $artWorkServices  = new ArtWorkServices;
        $is_admin         = $artWorkServices->checkAdmin($request);
        if($is_admin>0)
        {
            $templateServices = new TemplateServices;
            $templates        = $templateServices->getTestTemplates();
            $result           = [];
            if(count($templates)>0)
            {
                foreach ($templates as $template)
                {
                    $temp[] = [
                        'template_id'   => $template->temp_id,
                        'template_name' => $template->temp_name,
                        'image_name'    => $template->image_name,
                        'image_url'     => $template->image_url,
                        'image_png_url' => $template->image_png_url
                    ];
                }
                $result = $temp;
            }
            return Response::json([
                'result' => $result,
                'error'  => '',
                'status' => 'SUCCESS'
            ],200);
        }
        else
        {
            return Response::json([
                'result'   => '',
                'error'    => 'UnauthorisedAccess',
                'status'   => 'ERROR'
            ],424);
        }
    }
    /*
    * upload image to galley
    */
    public function postUpload(Request $request)
    {
        //validate file type
        $rules = [
            'post_name'   => 'required',
            'post_image'  => 'required',
            'template_id' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules );
        if ($validator->fails()) 
        {
            return Response::json([
                'result'  => '',
                'error'   => 'RequiredFieldsNull',
                'status'  => 'ERROR'
            ],422);
        }
        $artWorkServices = new ArtWorkServices;
        return $artWorkServices->uploadPost($request);
    }
    /*
    * List similar arts
    */
    public function listArtIdeas(Request $request) 
    {
        //validate file type
        $rules = [
            'template_id' => 'required',
        ];
        $validator = Validator::make($request->all(),$rules );
        if ($validator->fails()) 
        {
            return Response::json([
                'result'  => '',
                'error'   => 'RequiredFieldsNull',
                'status'  => 'ERROR'
            ],422);
        }
        $artWorkServices = new ArtWorkServices;
        return $artWorkServices->listArts($request);
    }
    /*
    * list comments and display post details
    */
    public function listComments(Request $request)
    {
        $artWorkServices = new ArtWorkServices;
        return $artWorkServices->postDetails($request);
    }
    /*
    * list comments and display post details
    */
    public function addComment(Request $request)
    {
        //validate comment
        $rules = [
            'comment'  => 'required',
            'post_id'  => 'required',
        ];
        $validator = Validator::make($request->all(),$rules );
        if ($validator->fails()) 
        {
            return Response::json([
                'result'  => '',
                'error'   => 'RequiredFieldsNull',
                'status'  => 'ERROR'
            ],422);
        }
        $artWorkServices = new ArtWorkServices;
        return $artWorkServices->addComment($request);
    }
    /*
    * delete selected comment
    */
    public function deleteComment(Request $request) 
    {
        $artWorkServices = new ArtWorkServices;
        return $artWorkServices->deleteComment($request);
    }
    /*
    * Like post
    */
    public function likePost(Request $request) 
    {
        $artWorkServices = new ArtWorkServices;
        return $artWorkServices->likePost($request);
    }
    /*
    * Like post
    */
    public function addFavouritePost(Request $request) 
    {
        $artWorkServices = new ArtWorkServices;
        return $artWorkServices->addToFavourite($request);
    }
    /*
    * Notification likes listing
    */
    public function listLikes(Request $request)
    {
        $artWorkServices = new ArtWorkServices;
        return $artWorkServices->listLikes($request);
    }
    /*
    * Notification likes listing
    */
    public function readLikes(Request $request)
    {
        $artWorkServices = new ArtWorkServices;
        return $artWorkServices->readLikes($request);
    }
    /*
    * Notification likes listing
    */
    public function notificationCount(Request $request)
    {
        $artWorkServices = new ArtWorkServices;
        return $artWorkServices->notificationCount($request);
    }
    /*
    * list comments
    */
    public function newComments(Request $request) 
    {
        $artWorkServices = new ArtWorkServices;
        return $artWorkServices->newComments($request);
    }
    /*
    * list comments
    */
    public function readComments(Request $request) 
    {
        $artWorkServices = new ArtWorkServices;
        return $artWorkServices->readComments($request);
    }
    /*
    * List new followings
    */
    public function listFollowings(Request $request)
    {
        $artWorkServices = new ArtWorkServices;
        return $artWorkServices->listFollowings($request);
    }
    /*
    * mark followings as as read 
    */
    public function readFollowings(Request $request) 
    {
        $artWorkServices = new ArtWorkServices;
        return $artWorkServices->readFollowings($request);
    }
    /*
    * user favourite posts
    */
    public function favouritePosts(Request $request) 
    {
        $artWorkServices = new ArtWorkServices;
        return $artWorkServices->userFavourites($request);
    }
    /*
    * Delete art work
    */
    public function deletePost(Request $request)
    {
        $artWorkServices = new ArtWorkServices;
        return $artWorkServices->deletePost($request);
    }
    /*
    * Explore screen list top atrworks 
    */
    public function inspire(Request $request)
    {
        $artWorkServices = new ArtWorkServices;
        return $artWorkServices->inspire($request);
    }
    /*
    * Explore screen new posts
    */
    public function newPosts(Request $request)
    {
        $artWorkServices = new ArtWorkServices;
        return $artWorkServices->newPosts($request);
    }
    /*
    * Explore screen followers posts
    */
    public function timeline(Request $request)
    {
        $artWorkServices = new ArtWorkServices;
        return $artWorkServices->timeline($request);
    }

    /*
    * get templte details by ID
    */
    public function getTemplate(Request $request)
    {
        $templateService = new TemplateServices;
        $emplate         = $templateService->getTemplateDetails($request->template_id);
        return Response::json([
            'result' => $emplate,
            'error'  => '',
            'status' => 'SUCCESS'
        ],200);
    }

    public function uploadPost(Request $request)
    {
        //validate file type
        $rules = [
            'post_name'   => 'required',
            'post_image'  => 'required',
            'template_id' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules );
        if ($validator->fails()) 
        {
            return Response::json([
                'result'  => '',
                'error'   => 'RequiredFieldsNull',
                'status'  => 'ERROR'
            ],422);
        }
        $artWorkServices = new ArtWorkServices;
        return $artWorkServices->uploadPost($request);
    }
}

