<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class User extends Authenticatable implements HasMedia
{
    use Notifiable;
    use HasMediaTrait;
    use HasRolesAndAbilities;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('avatar')
            ->registerMediaConversions(function (Media $media = null) {

                $this->addMediaConversion('small')
                    ->width(80)
                    ->height(80);

                $this->addMediaConversion('thumbnail')
                    ->width(150)
                    ->height(150);

                $this->addMediaConversion('medium')
                    ->width(300)
                    ->height(300);

                $this->addMediaConversion('large')
                    ->width(768)
                    ->height(768);
            });
    }
}
