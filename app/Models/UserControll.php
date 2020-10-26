<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserControll extends Model
{
    use HasFactory;
    protected $table = 'users';
    public function getRouteKeyName()
    {
        return 'name';
    }
}
