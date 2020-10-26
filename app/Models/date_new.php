<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class date_new extends Model
{
    use HasFactory;
    protected $table = 'date';
    protected $fillable = ['title' , 'test' , 'status'];
/*    public function getRouteKeyName()
    {
        return 'title';
    }*/
    public function user(){
        return $this->belongsTo(User::class);
    }

}
