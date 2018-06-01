<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $hidden = ['user_id', 'package_id', 'create_by', 'updated_at'];

    public function package()
    {
        return $this->belongsTo('App\Package', 'package_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function collections()
    {
        return $this->hasMany('App\Collection', 'account_id');
    }
}
