<?php

namespace SGH\Http\Controllers\Auth;

use SGH\Http\Controllers\Controller;

use SGH\Models\Role;

class RoleController extends Controller
{
	protected $route = 'auth.roles';
	protected $class = Role::class;

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
		$roles = Role::all();
		//Se carga la vista y se pasan los registros
		return view($this->route.'.index', compact('roles'));
	}

	/**
	 * Muestra el formulario para crear un nuevo registro.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Se crea un array con los Permission disponibles
		$arrPermisos = model_to_array(Permission::class, 'display_name');

		return view($this->route.'.create', compact('arrPermisos'));
	}

	/**
	 * Guarda el registro nuevo en la base de datos.
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(['permissions'=>'permisos_ids']);
	}


	/**
	 * Muestra el formulario para editar un registro en particular.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// Se obtiene el registro
		$rol = Role::findOrFail($id);

		//Se crea un array con los Permission disponibles
		$arrPermisos = model_to_array(Permission::class, 'display_name');
		$permisos_ids = $rol->permissions->pluck('id')->toJson();

		// Muestra el formulario de edición y pasa el registro a editar
		return view($this->route.'.edit', compact('rol', 'arrPermisos', 'permisos_ids'));
	}


	/**
	 * Actualiza un registro en la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		parent::updateModel($id, ['permissions'=>'permisos_ids']);
	}

	/**
	 * Elimina un registro de la base de datos.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		parent::destroyModel($id);
	}
	
}
