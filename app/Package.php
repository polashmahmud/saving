<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';
    protected $fillable = ['name', 'description', 'amount', 'type', 'period', 'status', 'create_by'];

    public function accounts()
    {
        return $this->hasMany('App\Account', 'package_id', 'id');
    }
}
