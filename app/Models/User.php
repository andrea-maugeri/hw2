<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class User extends Model{
    protected $fillable = ['username','pswd','nome','surname'];
    public $timestamps = false;
    public function favorites(){
        return $this->hasMany("Favorite");
    }

}



?>

