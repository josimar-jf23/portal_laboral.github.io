<?php

use Illuminate\Database\Seeder;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
            'nombre'        => 'Anonima',
            'descripcion'   => 'Empresa Primaria',
            'ciudad_id'     => '1',
            'rubro_id'      => '1'
        ]);
    }
}
