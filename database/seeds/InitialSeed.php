<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class InitialSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'organizer']);
        Role::create(['name' => 'student']);
    }
}
