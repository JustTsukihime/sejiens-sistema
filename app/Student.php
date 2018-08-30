<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Student extends Model
{
    use Filterable;

    protected $dates = ['applied_at', 'deleted_at', 'confirmed_at'];

    protected $guarded = ['created_at', 'updated_at'];

    public function emails() {
        return $this->hasMany(StudentEmails::class);
    }

    public function groups() {
        return $this->belongsToMany(Group::class)->withTimestamps();
    }

    public function scopeConfirmed(Builder $query)
    {
        return $query->whereNotNull('confirmed_at');
    }
}
