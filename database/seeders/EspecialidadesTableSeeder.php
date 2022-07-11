<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EspecialidadesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('especialidades')->delete();
        
        \DB::table('especialidades')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Medicina gral.',
                'detalles' => 'Medicina gral.',
                'color' => '#239a56',
                'icono' => NULL,
                'created_at' => '2022-07-10 16:09:25',
                'updated_at' => '2022-07-10 16:10:13',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Pediatría',
                'detalles' => 'Pediatría',
                'color' => '#2e76ad',
                'icono' => NULL,
                'created_at' => '2022-07-10 16:25:09',
                'updated_at' => '2022-07-10 16:25:09',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Cardiología',
                'detalles' => 'Cardiología',
                'color' => '#d11f54',
                'icono' => NULL,
                'created_at' => '2022-07-10 16:27:21',
                'updated_at' => '2022-07-10 16:27:21',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Octalmología',
                'detalles' => 'Octalmología',
                'color' => '#e651cb',
                'icono' => NULL,
                'created_at' => '2022-07-10 16:27:51',
                'updated_at' => '2022-07-10 16:27:51',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}