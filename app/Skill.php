<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['$name'];
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function customers () {
        return $this->hasMany(Customer::class);
    }

}
