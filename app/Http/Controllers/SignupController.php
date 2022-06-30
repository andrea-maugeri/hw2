<?php

namespace  App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Session;

class SignupController extends BaseController {
    public function signup(){
        $session_id = session('user_id');
        $session_user = session('username');
        if (isset($session_id) && isset($session_user))
            return redirect('home')->withInput(["user" => session('username')]);
        else {
            $data = request();
            if (!empty($data["username"]) && !empty($data["password"]) && !empty($data["name"]) && !empty($data["surname"]))
            {
                $row = User::where("username",$data["username"])->first();
                if ($row)
                    return '2';
                if (!preg_match("/^(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[A-Z])[a-zA-Z0-9!@#$%^&*]{8,16}$/", $data['password'])) {
                    return '2';
                } 
                $newUser = User::create([
                    'username' => $data['username'],
                    'pswd' => password_hash($data['password'],PASSWORD_BCRYPT),
                    'nome' => $data['name'],
                    'surname' => $data['surname']
                ]);
                session(['username' => $newUser["username"]]);
                session(['user_id' => $newUser["id"]]);
                return;
            }
            else{
                return '1';
            }
        }
    }
    public function checkUser(){
        $data = request();
        $row = User::where('username',$data['user'])->first();
        if($row)
            return '1';
    }
}
