<?php

namespace  App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Session;

class LoginController extends BaseController {
    public function index(){
        $session_id = session('user_id');
        $session_user = session('username');
        if (isset($session_id) && isset($session_user))
            return redirect('home')->withInput(["user" => session('username')]);
        else return view("login");
    }
    public function checkData(){
        $data = request();
        if (!empty($data["username"]) && !empty($data["password"]) ){
            $row = User::where("username",$data["username"])->first();
            if ($row){
                    if(password_verify($data["password"],$row["pswd"])){ //password check è criptata quindi non posso usare ===
                        session(['username' => $row["username"]]);
                        session(['user_id' => $row["id"]]);
                        return redirect('home')->withInput(["user" => session('username')]);
                    }
                }
            return view('login')->with("error", "Username e/o password errati.");
            }
        else if (isset($data["username"]) || isset($data["password"])) 
            return view("login")->with("error", "Inserisci username e password.");
    } 
}
?>