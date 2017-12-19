<?php
namespace SGH\Http\Controllers;
use SGH\Http\Controllers\Controller;

use \Carbon\Carbon;

use SGH\Models\Contrato;
use SGH\Models\EstadoContrato;
use SGH\Models\Ticket;
use SGH\Models\EstadoTicket;

class ReporteController extends Controller
{
	private $data = null;

	private $reportes = [
		'ContratosActPorFecha' => 'Contratos activos por fecha',
		'TicketsActPorFecha' => 'Tickets abiertos por fecha',
	];

	public function __construct()
	{
		//Datos recibidos desde la vista.
		$this->data = parent::getRequest();
	}

	/**
	 * Muestra una lista de los registros.
	 *
	 * @return Response
	 */
	public function index()
	{
		$arrReportes = $this->reportes;
		//Se carga la vista y se pasan los registros
		return view('reportes.index', compact('arrReportes'));
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function contratosActPorFecha()
	{

		$queryCollect = Contrato::leftJoin('TEMPORALES', 'TEMPORALES.TEMP_ID', '=', 'CONTRATOS.TEMP_ID')
							->leftJoin('MOTIVOSRETIROS', 'MOTIVOSRETIROS.MORE_ID', '=', 'CONTRATOS.MORE_ID')
							->join('PROSPECTOS AS PRO', 'PRO.PROS_ID', '=', 'CONTRATOS.PROS_ID')		
							->join('EMPLEADORES', 'EMPLEADORES.EMPL_ID', '=', 'CONTRATOS.EMPL_ID')
							->join('TIPOSCONTRATOS', 'TIPOSCONTRATOS.TICO_ID', '=', 'CONTRATOS.TICO_ID')
							->join('CLASESCONTRATOS', 'CLASESCONTRATOS.CLCO_ID', '=', 'CONTRATOS.CLCO_ID')
							->join('CARGOS', 'CARGOS.CARG_ID', '=', 'CONTRATOS.CARG_ID')
							->join('ESTADOSCONTRATOS', 'ESTADOSCONTRATOS.ESCO_ID', '=', 'CONTRATOS.ESCO_ID')
							->join('TIPOSEMPLEADORES', 'TIPOSEMPLEADORES.TIEM_ID', '=', 'CONTRATOS.TIEM_ID')
							->join('RIESGOS', 'RIESGOS.RIES_ID', '=', 'CONTRATOS.RIES_ID')
							->join('GERENCIAS', 'GERENCIAS.GERE_ID', '=', 'CONTRATOS.GERE_ID')
							->join('NEGOCIOS', 'NEGOCIOS.NEGO_ID', '=', 'CONTRATOS.NEGO_ID')
							->join('CENTROSCOSTOS', 'CENTROSCOSTOS.CECO_ID', '=', 'CONTRATOS.CECO_ID')
							->join('GRUPOS', 'GRUPOS.GRUP_ID', '=', 'CONTRATOS.GRUP_ID')
							->join('TURNOS', 'TURNOS.TURN_ID', '=', 'CONTRATOS.TURN_ID')
							->join('CIUDADES AS CIUDADES_CONTRATA', 'CIUDADES_CONTRATA.CIUD_ID', '=', 'CONTRATOS.CIUD_CONTRATA')
							->join('CIUDADES AS CIUDADES_SERVICIO', 'CIUDADES_SERVICIO.CIUD_ID', '=', 'CONTRATOS.CIUD_SERVICIO')
							->where('ESTADOSCONTRATOS.ESCO_ID', EstadoContrato::ACTIVO)
							->select([
								'EMPLEADORES.EMPL_NOMBRECOMERCIAL as EMPRESA',
								'TEMPORALES.TEMP_NOMBRECOMERCIAL as E.S.T',
								'TIPOSCONTRATOS.TICO_DESCRIPCION as TIPO_CONTRATO',
								'CLASESCONTRATOS.CLCO_DESCRIPCION as CLASE_CONTRATO',
								'PRO.PROS_CEDULA as CEDULA',
								expression_concat([
									'PROS_PRIMERNOMBRE',
									'PROS_SEGUNDONOMBRE',
									'PROS_PRIMERAPELLIDO',
									'PROS_SEGUNDOAPELLIDO'
								], 'PROS_NOMBRESAPELLIDOS', 'PRO'),
								'CONTRATOS.CONT_SALARIO AS SALARIO',
								'CARGOS.CARG_DESCRIPCION AS CARGO',
								'ESTADOSCONTRATOS.ESCO_DESCRIPCION AS ESTADO',
								'CONTRATOS.CONT_FECHAINGRESO AS FECHA_INGRESO',
								'CONTRATOS.CONT_FECHATERMINACION AS FECHA_FIN_CONTRATO',
								'CONTRATOS.CONT_FECHARETIRO AS FECHA_RETIRO',
								'CONTRATOS.CONT_FECHAGRABARETIRO AS FECHA_GRABA_RETIRO',
								'MOTIVOSRETIROS.MORE_DESCRIPCION AS MOTIVO_RETIRO',
								'CONTRATOS.CONT_VARIABLE AS VARIABLE',
								'CONTRATOS.CONT_RODAJE AS RODAJE',
								'TIPOSEMPLEADORES.TIEM_DESCRIPCION AS TIPO_EMPLEADOR',
								'RIESGOS.RIES_DESCRIPCION AS RIESGO',
								'GERENCIAS.GERE_DESCRIPCION AS GERENCIA',
								'NEGOCIOS.NEGO_DESCRIPCION AS NEGOCIO',
								'CENTROSCOSTOS.CECO_DESCRIPCION AS CENTRO_COSTO',
								'GRUPOS.GRUP_DESCRIPCION AS GRUPO_EMPLEADO',
								'TURNOS.TURN_DESCRIPCION AS TURNO_EMPLEADO',
								'CONTRATOS.CONT_CASOMEDICO AS CASO_MEDICO',
								/*
								\DB::raw("CONCAT(CLASESCONTRATOS.CLCO_DESCRIPCION,TIPOSCONTRATOS.TICO_DESCRIPCION) as full_name"),
								*/
								/*
								\DB::raw("CONCAT(CLASESCONTRATOS.CLCO_DESCRIPCION,TIPOSCONTRATOS.TICO_DESCRIPCION) as full_name"),
								*/
								'CIUDADES_CONTRATA.CIUD_NOMBRE AS CIUDAD_CONTRATO',
								'CIUDADES_SERVICIO.CIUD_NOMBRE AS CIUDAD_SERVICIO',
								'CONTRATOS.CONT_OBSERVACIONES AS OBSERVACIONES',
								'CONTRATOS.CONT_MOREOBSERVACIONES AS OBSERVACIONES_RETIRO',

							]);

		if(isset($this->data['fchaIniContrato']))
			$queryCollect->whereDate('CONT_FECHAINGRESO', '>=', Carbon::parse($this->data['fchaIniContrato']));
		if(isset($this->data['fchaFinContrato']))
			$queryCollect->whereDate('CONT_FECHAINGRESO', '<=', Carbon::parse($this->data['fchaFinContrato']));

		

		return response()->json($queryCollect->get());
	}

	/**
	 * 
	 *
	 * @return Json
	 */
	public function ticketsActPorFecha()
	{
		$queryCollect = Ticket::leftJoin('ESTADOSTICKETS', 'ESTADOSTICKETS.ESTI_ID', '=', 'TICKETS.ESTI_ID')
							->whereIn('TICKETS.ESTI_ID', [EstadoTicket::ABIERTO, EstadoTicket::REASIGNADO])
							->select([
								'TICK_ID as ID',
								'TICK_DESCRIPCION as Descripción',
								'TICK_FECHASOLICITUD as Fecha_Solicitud',
								'TICK_FECHAAPROBACION as Fecha_Aprobación',
								'ESTI_DESCRIPCION as Estado',
							]);

		if(isset($this->data['fchaIniSolicitud']))
			$queryCollect->whereDate('TICK_FECHASOLICITUD', '>=', Carbon::parse($this->data['fchaIniSolicitud']));
		if(isset($this->data['fchaFinSolicitud']))
			$queryCollect->whereDate('TICK_FECHASOLICITUD', '<=', Carbon::parse($this->data['fchaFinSolicitud']));

		return response()->json($queryCollect->get());
	}

}