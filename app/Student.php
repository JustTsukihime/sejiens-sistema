<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
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

    public function confirm()
    {
        $this->confirmed_at = Carbon::now();
        $this->save();
        return $this;
    }

    public function scopeConfirmed(Builder $query)
    {
        return $query->whereNotNull('confirmed_at');
    }
}
