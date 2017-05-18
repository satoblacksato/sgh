<?php

namespace SGH\Http\Controllers;

use SGH\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;

use SGH\Prospecto;

class ProspectosController extends Controller
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
			'PROS_CEDULA' => ['numeric', 'required','max:10'],
			'PROS_FECHAEXPEDICION' => ['required'],
			'PROS_PRIMERNOMBRE' => ['required', 'max:100'],
			'PROS_SEGUNDONOMBRE' => ['max:100'],	
			'PROS_PRIMERAPELLIDO' => ['required', 'max:100'],
			'PROS_SEGUNDOAPELLIDO' => ['max:100'],
			'PROS_SEXO' => ['required', 'max:1'],
			'PROS_DIRECCION', ['required', 'max:100'],
			'PROS_TELEFONO', ['max:10'],
			'PROS_CELULAR', ['max:15'],
			'PROS_COREO', ['max:100'],
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
		$prospectos = Prospecto::sortable('EMPL_NOMBRECOMERCIAL')->paginate();
		//Se carga la vista y se pasan los registros
		return view('admin/prospectos/index', compact('prospectos'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin/prospectos/create');
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
		$prospecto = Prospecto::create($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Empleador '.$prospecto->EMPL_ID.' creado exitosamente.', 'success' );
		return redirect()->route('admin.prospecto.index');
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function edit($EMPL_ID)
	{
		// Se obtiene el registro
		$prospecto = Prospecto::findOrFail($EMPL_ID);

		// Muestra el formulario de edición y pasa el registro a editar
		return view('admin/prospecto/edit', compact('prospecto'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function update($EMPL_ID)
	{
		//Datos recibidos desde la vista.
		$request = request();
		//Se valida que los datos recibidos cumplan los requerimientos necesarios.
		$this->validator($request);

		// Se obtiene el registro
		$prospecto = Prospecto::findOrFail($EMPL_ID);
		//y se actualiza con los datos recibidos.
		$prospecto->update($request->all());

		// redirecciona al index de controlador
		flash_alert( 'Empleador '.$prospecto->EMPL_ID.' modificado exitosamente.', 'success' );
		return redirect()->route('admin.prospecto.index');
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $EMPL_ID
	 * @return Response
	 */
	public function destroy($EMPL_ID, $showMsg=True)
	{
		$prospecto = Prospecto::findOrFail($EMPL_ID);

		//Si el registro fue creado por SYSTEM, no se puede borrar.
		if($prospecto->TIPR_creadopor == 'SYSTEM'){
			flash_modal( 'Temporale '.$prospecto->EMPL_ID.' no se puede borrar.', 'danger' );
		} else {
			$prospecto->delete();
				flash_alert( 'Empleador '.$prospecto->EMPL_ID.' eliminado exitosamente.', 'success' );
		}

		return redirect()->route('admin.prospecto.index');
	}
	
}
