<?php

namespace  App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Favorite;

class SearchController extends BaseController {
    public function index(){
        $session_id = session('user_id');
        $session_user = session('username');
        if (!isset($session_id) || !isset($session_user))
            return view('login');
        else return view("search")->with("user", $session_user);
    }
}