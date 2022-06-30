<?php

namespace  App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Favorite;

class HomeController extends BaseController {

    public function index() {
        $session_id = session('user_id');
        $session_user = session('username');
        if (!isset($session_id) || !isset($session_user))
            return view('login');
        else return view("home")->with("user", $session_user);
    }
    public function fill(){
        $_url_fetch_newdata = "https://newsdata.io/api/1/news?apikey=" .env('API_KEY_NEWSDATA')."&language=it,en&q=crypto";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $_url_fetch_newdata);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }
    public function checkFavorites(){
        $data = request();
        $row = Favorite::where("user_id", session('user_id')) ->where("title",$data["title"]) ->first();
        if($row)
            return '1';
        else return '0';
    }
    public function addFavorites(){
        $data = request();
        if(isset($data["img"]))
            $img_url = $data["img"];
        else $img_url = null;
        $newFavorite = Favorite::create([
            'user_id' => session('user_id'),
            'title' => $data['title'],
            'img_url' => $img_url,
            'content' => $data["article"],
            'link' => $data["link"],
            ]);
    }
}
?>