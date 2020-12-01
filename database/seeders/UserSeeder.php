<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = User::create([
            'name'  => 'Admin Transisi',
            'email'  => 'admin@transisi.id',
            'password' => bcrypt('transisi')
        ]);
    }
}
