<?php
namespace SGH\Http\Controllers\Reportes;
use SGH\Http\Controllers\Controller;

use \Carbon\Carbon;

use SGH\Models\Prospecto;
use SGH\Models\EstadoContrato;

class RptProspectosController extends ReporteController
{

	public function __construct()
	{
		parent::__construct();
	}


	private function getQuery()
	{
		$query = Prospecto::select([
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
		return $query;
	}


	/**
	 * 
	 *
	 * @return Json
	 */
	public function hojasDeVida()
	{
		$query = $this->getQuery();

		if(isset($this->data['prospecto']))
			$query->where('PROSPECTOS.PROS_ID', '=', $this->data['prospecto']);

		return $this->buildJson($query);
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function hojasDeVidaDescartadas()
	{
		$query = $this->getQuery()
			->where('PROSPECTOS.PROS_MARCA', '=', 'SI')
			->addSelect([
				'PROSPECTOS.PROS_MARCA as ¿DESCARTADA?',
				'PROSPECTOS.PROS_MARCAOBSERVACIONES as OBSERVACIONES',
			]);

		if(isset($this->data['prospecto']))
			$query->where('PROSPECTOS.PROS_ID', '=', $this->data['prospecto']);

		return $this->buildJson($query);
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function cumpleanios()
	{

		$db_start 	= Carbon::parse($this->data['fchaCumpleDesde']);
		$db_end		= Carbon::parse($this->data['fchaCumpleHasta']);

		$query = $this->getQuery()
			->join('CONTRATOS', 'CONTRATOS.PROS_ID', '=', 'PROSPECTOS.PROS_ID')
			->whereIn('CONTRATOS.ESCO_ID', [EstadoContrato::ACTIVO, EstadoContrato::VACACIONES])
			->whereMonth('PROSPECTOS.PROS_FECHANACIMIENTO', '>=', $db_start->month)
			->whereDay('PROSPECTOS.PROS_FECHANACIMIENTO', '>=', $db_start->day)	
			->whereMonth('PROSPECTOS.PROS_FECHANACIMIENTO', '<=', $db_end->month)
			->whereDay('PROSPECTOS.PROS_FECHANACIMIENTO', '<=', $db_end->day);	

		if(isset($this->data['prospecto']))
			$query->where('PROSPECTOS.PROS_ID', '=', $this->data['prospecto']);

		return $this->buildJson($query);
	}



}