<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class SecondSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::where('id',1)->first();

        $user->assignRole('super-admin');

        $user->givePermissionTo(Permission::all());
    }
}
