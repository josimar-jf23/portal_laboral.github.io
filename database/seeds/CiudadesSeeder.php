<?php

use Illuminate\Database\Seeder;

class CiudadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ciudades')->insert([
            'nombre'        => 'Ica',
            'departamento_id'   => '1'
        ]);
    }
}
