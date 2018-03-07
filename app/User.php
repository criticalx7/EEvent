<?php

namespace EEvent;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'avatar', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function attendees()
    {
        return $this->hasMany('EEvent\Attendee');
    }

    public function organizers()
    {
        return $this->hasMany('EEvent\Organizer');
    }

    public function attendEvent()
    {
        return $this->belongsToMany('EEvent\Event', 'attendees');
    }

    public function organizedEvent()
    {
        return $this->belongsToMany('EEvent\Event', 'organizers');
    }
}