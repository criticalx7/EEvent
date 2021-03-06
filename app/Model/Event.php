<?php

namespace EEvent;

use Carbon\Carbon;
use Eloquent;

class Event extends Eloquent
{
    protected $fillable = [
        'name', 'organizer_id', 'detail', 'precondition', 'location', 'code', 'category_id', 'price', 'payment_time'
        , 'start_time', 'max_capacity', 'image_path'
    ];

    protected $dates = ['payment_time', 'start_time'];

    public function attendees()
    {
        return $this->hasMany('EEvent\Attendee');
    }

    public function organizer()
    {
        return $this->belongsTo('EEvent\User', 'organizer_id');
    }

    public function category()
    {
        return $this->belongsTo('EEvent\Category');
    }


    /**
     * @param $user_id
     * @return bool
     */
    public function isAttend($user_id)
    {
        return Attendee::where('user_id', '=', $user_id)
                ->where('event_id', '=', $this->id)->count() > 0;
    }

    /**
     * @param $user_id
     * @return bool
     */
    public function isOrganizer($user_id)
    {
        return $this->organizer_id == $user_id;
    }

    public function getPriceText()
    {
        if ($this->price > 0) {
            return '$' . $this->price;
        }
        return 'Free!';
    }

    public function getRemainingSeat()
    {
        return $this->max_capacity - $this->cur_capacity;
    }

    public function getRemainingDay()
    {
        return Carbon::now()->diffInDays($this->start_time);
    }

    public function getFormattedDay()
    {
        return $this->start_time->format('l jS F Y h:i A');
    }

    public function getRecentEvent()
    {
        return Event::orderBy('created_at', 'desc')->limit(6);
    }

    public function getPopularEvent()
    {
        return Event::orderBy('cur_capacity', 'desc')->limit(3);
    }

    public function getPicture()
    {
        return isset($this->image_path) ? $this->image_path : mb_strtolower($this->category->name) . '.jpg';
    }

    public function getPaymentStatus($id, $event_id)
    {
        return Attendee::with('payment')->where('user_id', '=', $id)->where('event_id', '=', $event_id)->first()->payment->status;
    }


}
