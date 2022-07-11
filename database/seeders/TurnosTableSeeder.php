<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TurnosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('turnos')->delete();
        
        \DB::table('turnos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'mañana',
                'detalles' => 'de 8:00 a 12:00',
                'created_at' => '2022-07-10 16:08:26',
                'updated_at' => '2022-07-10 16:09:03',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'tarde',
                'detalles' => 'de 14:00 a 18:00',
                'created_at' => '2022-07-10 16:08:48',
                'updated_at' => '2022-07-10 16:08:48',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}