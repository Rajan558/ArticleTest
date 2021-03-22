<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogUser extends Model
{
    protected $table = 'blog_users';
    protected $primeryKey = 'userid';
    protected $fillable = [
        'name', 'email', 'password',
    ];
}
