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
        $user->name = 'sistemas';
        $user->email = 'ipduv.sistemas@gmail.com';
        $user->password = bcrypt('informatica');
        if (User::where('name', $user->name)->count() == 0) {
            $user->save();
            $user->assignRole($role_super_admin);
        }

        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('admin');
        if (User::where('name', $user->name)->count() == 0) {
            $user->save();
            $user->assignRole($role_admin);
        }

        $user = new User();
        $user->name = 'plisboa';
        $user->email = 'plisboa@gmail.com';
        $user->password = bcrypt('pablo123');
        if (User::where('name', $user->name)->count() == 0) {
            $user->save();
            $user->assignRole($role_admin);
        }

        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('admin');
        if (User::where('name', $user->name)->count() == 0) {
            $user->save();
            $user->assignRole($role_admin);
        }

        $user = new User();
        $user->name = 'hacevedo';
        $user->email = 'hacevedo.ipduv@gmail.com';
        $user->password = bcrypt('21849590');
        if (User::where('name', $user->name)->count() == 0) {
            $user->save();
            $user->assignRole($role_normal);
        }

        $user = new User();
        $user->name = 'ldisilvestre';
        $user->email = 'disilvestre.ipduv@gmail.com';
        $user->password = bcrypt('luicho123');
        if (User::where('name', $user->name)->count() == 0) {
            $user->save();
            $user->assignRole($role_normal);
        }

        // Lourdes Parra
        $user = new User();
        $user->name = 'lparra';
        $user->email = 'lparra@gmail.com';
        $user->password = bcrypt('123456');
        if (User::where('name', $user->name)->count() == 0) {
            $user->save();
            $user->assignRole($role_admin);
        }

        // NUEVOS USUARIOS
        // Matias Fernandez (123456)
        $user = new User();
        $user->name = 'mfernandez';
        $user->email = 'mfernandez@gmail.com';
        $user->password = bcrypt('123456');
        if (User::where('name', $user->name)->count() == 0) {
            $user->save();
            $user->assignRole($role_admin);
        }

        // Daniel Sotelo (Secretaria11)
        $user = new User();
        $user->name = 'dsotelo';
        $user->email = 'dsotelo@gmail.com';
        $user->password = bcrypt('Secretaria11');
        if (User::where('name', $user->name)->count() == 0) {
            $user->save();
            $user->assignRole($role_admin);
        }

        // Santiago Duarte (ipduv4)
        $user = new User();
        $user->name = 'sduarte';
        $user->email = 'sduarte@gmail.com';
        $user->password = bcrypt('ipduv4');
        if (User::where('name', $user->name)->count() == 0) {
            $user->save();
            $user->assignRole($role_admin);
        }
        // FIN NUEVOS USUARIOS
    }
}
