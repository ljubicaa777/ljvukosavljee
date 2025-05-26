<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=new User();
        $user->email='user@pwa.rs';
        $user->password='user';
        $user->role_id='1';

        $user->save();

        $user=new User();
        $user->email='editor@pwa.rs';
        $user->password='editor';
        $user->role_id='2';

        $user->save(); 

        $user=new User();
        $user->email='admin@pwa.rs';
        $user->password='admin';
        $user->role_id='3';

        $user->save();
    }
}
