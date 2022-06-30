<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Favorite extends Model{
    protected $fillable = ['user_id','title','img_url','content','link'];
    protected $table = 'favorites';
    public $timestamps = false;
    public function user(){
        return $this->BelongsTo("User","user_id"); //sintassi per specificare una chiave esterna diversa dalle convenzioni
    }

}



?>
