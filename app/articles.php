<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class articles extends Model
{
    protected $table = 'articles';
    protected $primeryKey = 'articleid ';
    protected $fillable = [
        'userid', 'title', 'articleimage','description'
    ];
}
