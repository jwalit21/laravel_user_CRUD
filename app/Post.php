<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    //
    //table name can change from here
    protected $table = 'posts';
    //primary key
    public $primaryKey = 'id';
    //times
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
