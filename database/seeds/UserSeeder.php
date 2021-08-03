<?php

use App\Models\Role;
use App\User;
use App\Models\Permission;
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
        $manager = Role::where('slug', 'admin')->first();
        $developer = Role::where('slug','worker')->first();
        $createTasks = Permission::where('slug','create-tasks')->first();
        $manageUsers = Permission::where('slug','manage-users')->first();
        $user1 = new User();
        $user1->name = 'Admin';
        $user1->email = 'admin@admin.com';
        $user1->password = bcrypt('secret');
        $user1->save();
        $user1->roles()->attach($manager);
        $user1->permissions()->attach($manageUsers);
        $user2 = new User();
        $user2->name = 'Worker';
        $user2->email = 'worker@worker.com';
        $user2->password = bcrypt('secret');
        $user2->save();
        $user2->roles()->attach( $developer);
        $user2->permissions()->attach( $createTasks);
    }
}