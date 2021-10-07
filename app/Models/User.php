<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable=[
        'username',
        'password'
    ];

    public function quiz(){
        $this->hasMany(Quiz::class);
    }

    public function result(){
        $this->hasMany(Result::class);
    }

    public function role(){
        $this->hasOne(UserRole::class);
    }
}
