<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded = [];

    public function members()
    {
        return $this->belongsToMany(Student::class)->withTimestamps();
    }

    public function leader()
    {
        return $this->belongsTo(User::class);
    }
}
