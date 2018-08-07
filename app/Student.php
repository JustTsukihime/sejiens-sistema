<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $dates = ['applied_at', 'deleted_at'];

    protected $guarded = ['created_at', 'updated_at'];

    public function groups() {
        return $this->belongsToMany(Group::class);
    }
}
