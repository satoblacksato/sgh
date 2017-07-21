<?php

namespace SGH\Http\Controllers\CnfgTickets;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use SGH\Http\Controllers\Controller;

use SGH\EstadoAprobacion;

class EstadoAprobacionController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:tkestados-index', ['only' => ['index']]);
		$this->middleware('permission:tkestados-create', ['only' => ['create', 'store']]);
		$this->middleware('permission:tkestados-edit', ['only' => ['edit', 'update']]);
		$this->middleware('permission:tkestados-delete',   ['only' => ['destroy']]);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  Request $request
	 * @return void
	 */
	protected function validator($data, $id = 0)
	{
		$validator = Validator::make($data, [
			'ESAP_DESCRIPCION' => ['required', 'max:100', 'unique:ESTADOSAPROBACIONES,ESAP_DESCRIPCION,'.$id.',ESAP_ID'],
			'ESAP_COLOR' => ['required', 'max:100'],
			'ESAP_OBSERVACIONES' => ['max:300'],
		]);

		if ($validator->fails())
			return redirect()->back()
						->withErrors($validator)
						->withInput()->send();
	}


	/**
	 * Muestra una lista de los registros.
	 *
	 * @return Response
	 */
	public function index()
	{
		//Se obtienen todos los registros.
		$estadosaprobaciones = EstadoAprobacion::all();
		//Se carga la vista y se pasan los registros
		return view('cnfg-tickets/estadosaprobaciones/index', compact('estadosaprobaciones'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cnfg-tickets/estadosaprobaciones/create');
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(EstadoAprobacion::class, 'cnfg-tickets.estadosaprobaciones.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $ESAP_ID
	 * @return Response
	 */
	public function edit($ESAP_ID)
	{
		// Se obtiene el registro
		$estadoaprobacion = EstadoAprobacion::findOrFail($ESAP_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view('cnfg-tickets/estadosaprobaciones/edit', compact('estadoaprobacion'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $ESAP_ID
	 * @return Response
	 */
	public function update($ESAP_ID)
	{
		parent::updateModel($ESAP_ID, EstadoAprobacion::class, 'cnfg-tickets.estadosaprobaciones.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $ESAP_ID
	 * @return Response
	 */
	public function destroy($ESAP_ID, $showMsg=True)
	{
		$estadoaprobacion = EstadoAprobacion::findOrFail($ESAP_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($estadoaprobacion->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Temporale '.$estadoaprobacion->ESAP_ID.' no se puede borrar.', 'danger' );
		} else {
			$estadoaprobacion->delete();
				flash_alert( 'Estado de Aprobación '.$estadoaprobacion->ESAP_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('cnfg-tickets.estadosaprobaciones.index');
	}
	
}