<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    public function account()
    {
        return $this->belongsTo('App\Account', 'account_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'collect_by');
    }
}
