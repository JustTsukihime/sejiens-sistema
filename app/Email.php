<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $guarded = ['created_at', 'updated_at'];

    public function student() {
        return $this->belongsTo(Student::class);
    }
}
