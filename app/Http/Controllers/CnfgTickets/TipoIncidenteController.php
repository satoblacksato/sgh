<?php

namespace SGH\Http\Controllers\CnfgTickets;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\Models\TipoIncidente;

class TipoIncidenteController extends Controller
{
	protected $route = 'cnfg-tickets.tiposincidentes';
	protected $class = TipoIncidente::class;

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  Request $request
	 * @return void
	 */
	protected function validator($data, $id = 0)
	{
		return Validator::make($data, [
			'TIIN_DESCRIPCION' => ['required', 'max:100', 'unique:TIPOSINCIDENTES,TIIN_DESCRIPCION,'.$id.',TIIN_ID'],
			'TIIN_OBSERVACIONES' => ['max:300'],
		]);
	}


	/**
	 * Muestra una lista de los registros.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Se obtienen todos los registros.
		$tiposincidentes = TipoIncidente::all();
		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('tiposincidentes'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view($this->route.'.create');
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
	 * @param  int  $TIIN_ID
	 * @return Response
	 */
	public function edit($TIIN_ID)
	{
		// Se obtiene el registro
		$tipoincidente = TipoIncidente::findOrFail($TIIN_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('tipoincidente'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $TIIN_ID
	 * @return Response
	 */
	public function update($TIIN_ID)
	{
		parent::updateModel($TIIN_ID);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $TIIN_ID
	 * @return Response
	 */
	public function destroy($TIIN_ID)
	{
		parent::destroyModel($TIIN_ID);
	}
	
}
