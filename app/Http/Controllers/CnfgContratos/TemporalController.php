<?php

namespace SGH\Http\Controllers\CnfgContratos;

use SGH\Http\Controllers\Controller;

use SGH\Models\Temporal;

class TemporalController extends Controller
{
	protected $route = 'cnfg-contratos.temporales';
	protected $class = Temporal::class;

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Muestra una lista de los registros.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Se obtienen todos los registros.
		$temporales = Temporal::all();
		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('temporales'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Se crea un array con los prospectos disponibles
		$arrProspectos = model_to_array(Prospecto::class, expression_concat([
				'PROS_PRIMERNOMBRE',
				'PROS_SEGUNDONOMBRE',
				'PROS_PRIMERAPELLIDO',
				'PROS_SEGUNDOAPELLIDO',
				'PROS_CEDULA',
			], 'PROS_NOMBRESAPELLIDOS'));

		return view($this->route.'.create', compact('arrProspectos'));
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel();
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $TEMP_ID
	 * @return Response
	 */
	public function edit($TEMP_ID)
	{
		// Se obtiene el registro
		$temporal = Temporal::findOrFail($TEMP_ID);

		//Se crea un array con los prospectos disponibles
		$arrProspectos = model_to_array(Prospecto::class, expression_concat([
				'PROS_PRIMERNOMBRE',
				'PROS_SEGUNDONOMBRE',
				'PROS_PRIMERAPELLIDO',
				'PROS_SEGUNDOAPELLIDO',
				'PROS_CEDULA',
			], 'PROS_NOMBRESAPELLIDOS'));

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('temporal','arrProspectos'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $TEMP_ID
	 * @return Response
	 */
	public function update($TEMP_ID)
	{
		parent::updateModel($TEMP_ID);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $TEMP_ID
	 * @return Response
	 */
	public function destroy($TEMP_ID)
	{
		parent::destroyModel($TEMP_ID);
	}
	
}
