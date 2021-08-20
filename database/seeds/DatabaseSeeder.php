<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProvinciaSeeder::class);
        $this->call(LocalidadSeeder::class);
        $this->call(TipoResolucionSeeder::class);
        $this->call(CargoSeeder::class);
        $this->call(AgenteSeeder::class);
        // $this->call(RoleAndPermissionsSeeder::class);
        $this->call(UserSeeder::class);
    }
}
