<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserServices;

class AppUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /*
     * List registered users
     */
    public function index(Request $request) {
        $userService     = new UserServices;
        $result['users'] = $userService->getUsers();
        return view('users.users_list',$result);
    }
    
    /*
     * block user 
     */
    public function blockUsers($id,Request $request) {
        $userService = new UserServices;
        $userService->blockUser($id);
        return redirect('users');
    }
    
    /*
     * block user 
     */
    public function getUserDetails($id,Request $request) {
        $userService = new UserServices;
        $result['user'] = $userService->getUserDetails($id);
        return view('users.user_details',$result);
    }
    
    
}
