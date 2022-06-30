<?php

namespace  App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Favorite;

class FavoriteController extends BaseController {
    public function index(){
        $session_id = session('user_id');
        $session_user = session('username');
        if (!isset($session_id) || !isset($session_user))
            return view('login');
        else return view("favorite")->with("user", $session_user);
    }
    public function fill(){
        $session_id = session('user_id');
        $rows = Favorite::where("user_id", $session_id)->get();
        return $rows;
    }
    public function delete(){
        $session_id = session('user_id');
        $data = request();
        $row = Favorite::where("user_id", $session_id)->where("title",$data['title'])->delete();
        return $this->fill();
    }
}
?>