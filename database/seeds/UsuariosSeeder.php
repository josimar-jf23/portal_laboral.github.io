<?php

use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'          => 'Administrador',
            'email'         => 'admin@admin.com',
            'password'      =>  bcrypt('admin123'),
            'empresa_id'   =>  '1'
        ]);
    }
}
