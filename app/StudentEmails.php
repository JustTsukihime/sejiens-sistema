<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentEmails extends Model
{
    protected $fillable = ['type'];

    public function student() {
        return $this->belongsTo(Student::class);
    }
}
