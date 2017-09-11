<?php

use Illuminate\Database\Seeder;
use SGH\Models\Temporal;

class TemporalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
	{
		//$this->command->info('---Seeder Temporales');
		
		$temporal = new Temporal;
        $temporal->TEMP_RAZONSOCIAL = 'PROSERVIS TEMPORALES SAS';
        $temporal->TEMP_NOMBRECOMERCIAL = 'PROSERVIS';
        $temporal->TEMP_DIRECCION = 'CALLE 39 E BIS 89';
        $temporal->TEMP_OBSERVACIONES =  'TEMPORAL DE PRUEBA';
        $temporal->PROS_ID =  5;
        $temporal->TEMP_CREADOPOR =  'SYSTEM';
        $temporal->save();

        $temporal = new Temporal;
        $temporal->TEMP_RAZONSOCIAL = 'ATIEMPO SAS';
        $temporal->TEMP_NOMBRECOMERCIAL = 'ATIEMPO';
        $temporal->TEMP_DIRECCION = 'CALLE 39 E BIS 89';
        $temporal->TEMP_OBSERVACIONES =  'TEMPORAL DE PRUEBA';
        $temporal->PROS_ID =  6;
        $temporal->TEMP_CREADOPOR =  'SYSTEM';
        $temporal->save();

	}

}
