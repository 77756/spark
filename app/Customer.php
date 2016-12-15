<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'companyName',
        'email',
        'phone',
        'street',
        'streetNum',
        'zip',
        'city',
        'country',
        'kvk',
        'btw',
        'ending_on',
        'pic',
    ];

    protected $hidden = [
        'id',
        'user_id',
        'created_on'
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function contactPerson () {
        return $this->hasOne(User::class);
    }

    public function skills () {
        return $this->hasMany(Skill::class);
    }
}
