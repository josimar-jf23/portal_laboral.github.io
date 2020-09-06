<?php

use Illuminate\Database\Seeder;

class RubrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rubros')->insert([
            'nombre'        => 'Agricola',
            'descripcion'   => 'Rubro agricola'
        ]);
    }
}
