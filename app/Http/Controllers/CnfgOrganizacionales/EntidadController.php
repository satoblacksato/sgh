<?php 
namespace SGH\Http\Controllers\CnfgOrganizacionales;

use Validator;
use SGH\Http\Requests;
use Flash;
use Session;
use Redirect;
use SGH\Http\Controllers\Controller;
use Response;
use SGH\Models\Entidad;
use Yajra\Datatables\Facades\Datatables;

class EntidadController extends Controller
{

	
	protected $route='cnfg-organizacionales.entidades';
	protected $class = Entidad::class;
	public function __construct()
	{	
		
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  Request $request
	 * @return void
	 */
	protected function validator($data)
	{
		return validator::make($data, Entidad::$rules);

	}

	
	/**
	 * Display a listing of the Entidad.
	 *
	 * @return Response
	 */
	public function index()
	{
		$entidades = Entidad::with('tipoentidad')->get();
		return view($this->route.'.index', compact('entidades'));
	}

	
	/**
	 * Show the form for creating a new Entidad.
	 *
	 * @return Response
	 */
	public function create()
	{
		$arrTipoEntidad = model_to_array(TipoEntidad::class, 'TIEN_DESCRIPCION');

		return view($this->route.'.create', compact('arrTipoEntidad'));
	}

	/**
	 * Store a newly created Entidad in storage.
	 *
	 * @param CreateEntidadRequest $request
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel(Entidad::class,  $this->routeIndex);
	}

	/**
	 * Display the specified Entidad.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show(Entidad $entidades){
	}

	/**
	 * Show the form for editing the specified Entidad.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit(Entidad $entidades)
	{		
		$arrTipoEntidad = model_to_array(TipoEntidad::class, 'TIEN_DESCRIPCION');
		return view($this->route.'.edit',['entidad'=>$entidades,'arrTipoEntidad'=>$arrTipoEntidad]);
	}

	/**
	 * Update the specified Entidad in storage.
	 *
	 * @param  int              $id
	 * @param UpdateEntidadRequest $request
	 *
	 * @return Response
	 */
	public function update($ID)
	{
		parent::updateModel($ID, Entidad::class,  $this->routeIndex);
	}

	/**
	 * Remove the specified Entidad from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($ID)
	{
		parent::destroyModel($ID, Entidad::class, $this->routeIndex);
	}
}
