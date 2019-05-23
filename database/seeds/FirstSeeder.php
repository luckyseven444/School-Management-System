<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;


class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

       User::insert([
            'name' => 'Noman Ahmed',
            'email' => 'noman@email.com',
            'password' => bcrypt('12345678'),
            'status'=> 1,
            'role_id'=>1
        ]);

        // create permissions
        Permission::create(['name' => 'delete student']);
        Permission::create(['name' => 'delete teacher']);
        Permission::create(['name' => 'delete guardian']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        Role::create(['name' => 'teacher']);
        Role::create(['name' => 'student']);
        Role::create(['name' => 'guardian']);
    }
}
