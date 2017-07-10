<?php

use Illuminate\Database\Seeder;

class ProspectosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//$this->command->info('---Seeder Prospectos');
    	
    	$prospecto = new \SGH\Prospecto;
    	$prospecto->PROS_CEDULA = 1144173746;
    	$prospecto->PROS_FECHAEXPEDICION =  '2011-12-26';
    	$prospecto->PROS_PRIMERNOMBRE =  'KEVIN';
    	$prospecto->PROS_SEGUNDONOMBRE =  'FABIAN';
    	$prospecto->PROS_PRIMERAPELLIDO =  'RODRIGUEZ';
    	$prospecto->PROS_SEGUNDOAPELLIDO =  'COLLAZOS';
    	$prospecto->PROS_SEXO =  'M';
    	$prospecto->PROS_DIRECCION =  'CALLE 72K # 8 N 76';
    	$prospecto->PROS_TELEFONO =  '4059682';
    	$prospecto->PROS_CELULAR =  '3177274520';
    	$prospecto->PROS_CORREO =  'rodriguez221293@outlook.com';
    	$prospecto->PROS_CREADOPOR =  'SYSTEM';
    	$prospecto->save();

        $prospecto = new \SGH\Prospecto;
        $prospecto->PROS_CEDULA = 1144173745;
        $prospecto->PROS_FECHAEXPEDICION =  '2011-12-26';
        $prospecto->PROS_PRIMERNOMBRE =  'HECTOR';
        $prospecto->PROS_SEGUNDONOMBRE =  'FABIO';
        $prospecto->PROS_PRIMERAPELLIDO =  'GONZALEZ';
        $prospecto->PROS_SEGUNDOAPELLIDO =  'GAVIRIA';
        $prospecto->PROS_SEXO =  'M';
        $prospecto->PROS_DIRECCION =  'CALLE 72K # 8 N 75';
        $prospecto->PROS_TELEFONO =  '4059682';
        $prospecto->PROS_CELULAR =  '3177274520';
        $prospecto->PROS_CORREO =  'hector@outlook.com';
        $prospecto->PROS_CREADOPOR =  'SYSTEM';
        $prospecto->save();

        $prospecto = new \SGH\Prospecto;
        $prospecto->PROS_CEDULA = 1144173744;
        $prospecto->PROS_FECHAEXPEDICION =  '2011-12-26';
        $prospecto->PROS_PRIMERNOMBRE =  'DIEGO';
        $prospecto->PROS_SEGUNDONOMBRE =  'ARMANDO';
        $prospecto->PROS_PRIMERAPELLIDO =  'CORTES';
        $prospecto->PROS_SEGUNDOAPELLIDO =  'VALENCIA';
        $prospecto->PROS_SEXO =  'M';
        $prospecto->PROS_DIRECCION =  'CALLE 72K # 8 N 75';
        $prospecto->PROS_TELEFONO =  '4059682';
        $prospecto->PROS_CELULAR =  '3177274520';
        $prospecto->PROS_CORREO =  'diego@outlook.com';
        $prospecto->PROS_CREADOPOR =  'SYSTEM';
        $prospecto->save();
    }
}
