<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

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

    /**
     * @return Collection
     */
    public function getMemberVCards()
    {
        $vcards = collect();

        $this->members->each(function(Student $member) use ($vcards) {
            $vcards->push($member->getVCard());
        });

        return $vcards;
    }

    public static function getWhatsappGroup()
    {
        return self::firstOrCreate(['name' => 'Whatsapp'], ['leader_id' => Auth::user()->id]);
    }
}
