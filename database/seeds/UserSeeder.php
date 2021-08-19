<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_super_admin = Role::where('name', 'super-admin')->first();
        $role_normal = Role::where('name', 'normal')->first();
        $role_admin = Role::where('name', 'admin')->first();

        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('admin');
        if (User::where('name', $user->name)->count() == 0) {
            $user->save();
            $user->assignRole($role_admin);
        }

        $user = new User();
        $user->name = 'ldisilvestre';
        $user->email = 'disilvestre.ipduv@ipduv.com';
        $user->password = bcrypt('luicho123');
        if (User::where('name', $user->name)->count() == 0) {
            $user->save();
            $user->assignRole($role_normal);
        }

        // Matias Fernandez (123456)
        $user = new User();
        $user->name = 'mfernandez';
        $user->email = 'mfernandez@ipduv.com';
        $user->password = bcrypt('123456');
        if (User::where('name', $user->name)->count() == 0) {
            $user->save();
            $user->assignRole($role_admin);
        }
        
        // Daniel Ramirez (ipduv4)
        $user = new User();
        $user->name = 'dramirez';
        $user->email = 'dramirez@ipduv.com';
        $user->password = bcrypt('ipduv1');
        if (User::where('name', $user->name)->count() == 0) {
            $user->save();
            $user->assignRole($role_admin);
        }

        // Daniel Sotelo (Secretaria11)
        $user = new User();
        $user->name = 'dsotelo';
        $user->email = 'dsotelo@ipduv.com';
        $user->password = bcrypt('Secretaria11');
        if (User::where('name', $user->name)->count() == 0) {
            $user->save();
            $user->assignRole($role_admin);
        }

        // Isabel Mainetti
        $user = new User();
        $user->name = 'imainetti';
        $user->email = 'imainetti@ipduv.com';
        $user->password = bcrypt('Secretaria123');
        if (User::where('name', $user->name)->count() == 0) {
            $user->save();
            $user->assignRole($role_admin);
        }

        // Jose Luis Robledo
        $user = new User();
        $user->name = 'jrobledo';
        $user->email = 'jrobledo@ipduv.com';
        $user->password = bcrypt('Secretaria23');
        if (User::where('name', $user->name)->count() == 0) {
            $user->save();
            $user->assignRole($role_admin);
        }

        // Luis Ortiz
        $user = new User();
        $user->name = 'lortiz';
        $user->email = 'lortiz@ipduv.com';
        $user->password = bcrypt('Secretaria3');
        if (User::where('name', $user->name)->count() == 0) {
            $user->save();
            $user->assignRole($role_admin);
        }

        // Martin Chiarelli
        $user = new User();
        $user->name = 'mchiarelli';
        $user->email = 'mchiarelli@ipduv.com';
        $user->password = bcrypt('Secretaria1');
        if (User::where('name', $user->name)->count() == 0) {
            $user->save();
            $user->assignRole($role_admin);
        }

        // Pablo Lisboa
        $user = new User();
        $user->name = 'plisboa';
        $user->email = 'plisboa@ipduv.com';
        $user->password = bcrypt('pablo123');
        if (User::where('name', $user->name)->count() == 0) {
            $user->save();
            $user->assignRole($role_admin);
        }

        // Santiago Duarte (ipduv4)
        $user = new User();
        $user->name = 'sduarte';
        $user->email = 'sduarte@ipduv.com';
        $user->password = bcrypt('ipduv4');
        if (User::where('name', $user->name)->count() == 0) {
            $user->save();
            $user->assignRole($role_admin);
        }

        // Wuerich Erica
        $user = new User();
        $user->name = 'ewuerich';
        $user->email = 'ewuerich@ipduv.com';
        $user->password = bcrypt('ipduv4');
        if (User::where('name', $user->name)->count() == 0) {
            $user->save();
            $user->assignRole($role_admin);
        }
    }
}
