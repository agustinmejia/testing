<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PacientesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pacientes')->delete();
        
        \DB::table('pacientes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => NULL,
                'nombre_completo' => 'Marcelo Nosa A.',
                'ci' => '15482648',
                'ci_exp' => 'BE',
                'fecha_nac' => '1991-07-10',
                'genero' => 'masculino',
                'imagen' => NULL,
                'celular' => '75199157',
                'direccion' => NULL,
                'created_at' => '2022-07-10 17:59:53',
                'updated_at' => '2022-07-10 17:59:53',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}