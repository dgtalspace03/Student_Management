<?php

namespace Database\Seeders;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $St_role = Roles::where('slug', 'student')->firstOrFail();
       $T_role=Roles::where('slug', 'teacher')->firstOrFail();
       $A_role=Roles::where('slug', 'admin')->firstOrFail();
        $student = User::create([
            'name' => 'Yeasin Arafat',
            'email' => 'yachenarafath@gmail.com',
            'password' => Hash::make('test@123'),
            'role_id' => $St_role->id,
        ]);
        $teacher = User::create([
            'name' => 'Teacher Arafat',
            'email' => 'teacherarafat@gmail.com',
            'password' => Hash::make('test@123'),
            'role_id' => $T_role->id,
        ]);
        $admin = User::create([
            'name' => 'Admin Arafat',
            'email' => 'adminarafat@gmail.com',
            'password' => Hash::make('test@123'),
            'role_id' => $A_role->id,
        ]);
    }
}
