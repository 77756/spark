<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'firstName',
        'lastName',
        'companyName',
        'email',
        'password',
        'streetName',
        'houseNumber',
        'zipCode',
        'city',
        'country',
        'phone',
        'mobile',
        'kvk',
        'btw',
        'ending_on',
        'pic',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'remember_token',
    ];

    public function customers () {
        return $this->hasMany(Customer::class);
    }
}
