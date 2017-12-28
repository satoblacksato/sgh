<?php
namespace SGH\Http\Controllers\Reportes;
use SGH\Http\Controllers\Controller;

use SGH\Models\Prospecto;

class RptProspectosController extends ReporteController
{

	public function __construct()
	{
		parent::__construct();
	}


	/**
	 * 
	 *
	 * @return Json
	 */
	public function hojasDeVida()
	{
		$queryCollect = Prospecto::select([
								'PROSPECTOS.PROS_CEDULA as CEDULA',
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'NOMBRE_EMPLEADO', 'PROSPECTOS'),
								'PROSPECTOS.PROS_FECHANACIMIENTO as FECHA_NACIMIENTO',
								'PROSPECTOS.PROS_FECHAEXPEDICION as FECHA_EXPEDICION',
								'PROSPECTOS.PROS_SEXO as SEXO',
								'PROSPECTOS.PROS_DIRECCION as DIRECCION',
								'PROSPECTOS.PROS_TELEFONO as TELEFONO',
								'PROSPECTOS.PROS_CELULAR as CELULAR',
								'PROSPECTOS.PROS_CORREO as EMAIL',
							]);

		if(isset($this->data['prospecto']))
			$queryCollect->where('PROSPECTOS.PROS_ID', '=', $this->data['prospecto']);

		return $this->buildJson($queryCollect);
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function hojasDeVidaDescartadas()
	{
		$queryCollect = Prospecto::where('PROSPECTOS.PROS_MARCA', '=', 'SI')
								->select([
							    'PROSPECTOS.PROS_CEDULA as CEDULA',
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'NOMBRE_EMPLEADO', 'PROSPECTOS'),
								'PROSPECTOS.PROS_MARCA as ¿DESCARTADA?',
								'PROSPECTOS.PROS_MARCAOBSERVACIONES as OBSERVACIONES',
								'PROSPECTOS.PROS_FECHANACIMIENTO as FECHA_NACIMIENTO',
								'PROSPECTOS.PROS_FECHAEXPEDICION as FECHA_EXPEDICION',
								'PROSPECTOS.PROS_SEXO as SEXO',
								'PROSPECTOS.PROS_DIRECCION as DIRECCION',
								'PROSPECTOS.PROS_TELEFONO as TELEFONO',
								'PROSPECTOS.PROS_CELULAR as CELULAR',
								'PROSPECTOS.PROS_CORREO as EMAIL',
							]);

		if(isset($this->data['prospecto']))
			$queryCollect->where('PROSPECTOS.PROS_ID', '=', $this->data['prospecto']);

		return $this->buildJson($queryCollect);
	}



}