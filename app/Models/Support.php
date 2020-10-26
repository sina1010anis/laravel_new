<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;
    protected $table = 'support';
    protected $fillable = ['title' , 'not'] ;
    protected $attributes = [
      'status' => '0' ,
    ];
    public function user_name(){
        return $this->belongsToMany('App\Model\User');
    }
}
