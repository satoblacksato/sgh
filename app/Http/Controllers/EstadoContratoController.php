<?php

namespace SGH\Http\Controllers;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;

use SGH\Estadoscontrato;

class EstadoscontratosController extends Controller
{
    //

    public function __construct()
	{
		$this->middleware('auth');
	}


	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  Request $request
	 * @return void
	 */
	protected function validator($request)
	{
		$validator = Validator::make($request->all(), [
			'ESCO_DESCRIPCION' => ['required', 'max:100'],
			'ESCO_OBSERVACIONES' => ['max:300'],
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
		$estadoscontratos = Estadoscontrato::sortable('ESCO_CODIGO')->paginate();
		//Se carga la vista y se pasan los registros
		return view('admin/estadoscontratos/index', compact('estadoscontratos'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin/estadoscontratos/create');
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		//Datos recibidos desde la vista.
		$request = request();
		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($request);

		//Se crea el registro.
		$estadocontrato = Estadoscontrato::create($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Estado de contrato '.$estadocontrato->ESCO_ID.' creado exitosamente.', 'success' );
		return redirect()->route('admin.estadoscontratos.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $ESCO_ID
	 * @return Response
	 */
	public function edit($ESCO_ID)
	{
		// Se obtiene el registro
		$estadocontrato = Estadoscontrato::findOrFail($ESCO_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view('admin/estadoscontratos/edit', compact('estadocontrato'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $ESCO_ID
	 * @return Response
	 */
	public function update($ESCO_ID)
	{
		//Datos recibidos desde la vista.
		$request = request();
		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($request);

		// Se obtiene el registro
		$estadocontrato = Estadoscontrato::findOrFail($ESCO_ID);
		//y se actualiza con los datos recibidos.
		$estadocontrato->update($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Estado de contrato '.$estadocontrato->ESCO_ID.' modificado exitosamente.', 'success' );
		return redirect()->route('admin.estadoscontratos.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $ESCO_ID
	 * @return Response
	 */
	public function destroy($ESCO_ID, $showMsg=True)
	{
		$estadocontrato = Estadoscontrato::findOrFail($ESCO_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($estadocontrato->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Estadoscontrato '.$estadocontrato->ESCO_ID.' no se puede borrar.', 'danger' );
		} else {
			$estadocontrato->delete();
				flash_alert( 'Estadoscontrato '.$estadocontrato->ESCO_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('admin.estadoscontratos.index');
	}
	
}