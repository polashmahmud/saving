<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    protected $table = 'abilities';
    protected $fillable = ['name', 'title', 'category'];
}
