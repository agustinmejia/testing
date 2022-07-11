<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DoctoresTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('doctores')->delete();
        
        \DB::table('doctores')->insert(array (
            0 => 
            array (
                'id' => 1,
                'especialidad_id' => 1,
                'user_id' => NULL,
                'turno_id' => 1,
                'nombre_completo' => 'Juan Perez Mendez',
                'ci' => '3453453',
                'imagen' => NULL,
                'descripcion' => NULL,
                'estado' => 'disponible',
                'created_at' => '2022-07-10 17:08:17',
                'updated_at' => '2022-07-10 17:08:17',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'especialidad_id' => 2,
                'user_id' => NULL,
                'turno_id' => 1,
                'nombre_completo' => 'Mario Arias P.',
                'ci' => '45645654',
                'imagen' => NULL,
                'descripcion' => NULL,
                'estado' => 'disponible',
                'created_at' => '2022-07-10 17:09:02',
                'updated_at' => '2022-07-10 17:09:02',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}