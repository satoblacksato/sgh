<?php 
namespace SGH\Http\Controllers\CnfgAusentismos;

use Validator;
use SGH\Http\Requests;
use Illuminate\Http\Request;
use Flash;
use SGH\Http\Controllers\Controller;
use Response;
use SGH\Models\Ausentismo;
use SGH\Models\Diagnostico;
use SGH\Models\Prospecto;
use SGH\Models\Contrato;
use SGH\Models\ConceptoAusencia;
use SGH\Models\Entidad;
use Yajra\Datatables\Facades\Datatables;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;

class AusentismoController extends Controller
{
	protected $view  = 'cnfg-ausentismos';
	protected $route = 'ausentismos';
	protected $class = Ausentismo::class;
	
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
	protected function validator($data)
	{
		return validator::make($data, Ausentismo::$rules);

	}

	
	/**
	 * Display a listing of the Ausentismo.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ausentismos = Ausentismo::all();
		return view($this->view.'.'.$this->route.'.index', compact('ausentismos'));
		
	}

	public function buscaDx(Request $request)
	{
		$data=Diagnostico::select('DIAG_ID','DIAG_DESCRIPCION')->where('DIAG_CODIGO',$request->CIE10)->get();
		return response()->json($data);
	}

	

	public function autoComplete(Request $request) {
	    $term = $request->term;
	    $data=Diagnostico::where('DIAG_DESCRIPCION','LIKE','%'.$term.'%')
	 		->take(10)
	 		->get();
	    $results=array();
	    foreach ($data as $v) {
	            $results[]=['id'=>$v->DIAG_ID,'value'=>$v->DIAG_DESCRIPCION,'cod'=>$v->DIAG_CODIGO];
	    }
	    if(count($results))
	         return $results;
	    else
	        return ['value'=>'No se encontró ningun Resultado','id'=>''];
	}



	public function buscaContrato(Request $request)
	{ 
		$data = Prospecto::join('CONTRATOS', 'CONTRATOS.PROS_ID', '=', 'PROSPECTOS.PROS_ID')
						->where([
						    ['PROSPECTOS.PROS_ID', '=', $request->PROSPECTO],
						    ['CONTRATOS.ESCO_ID', '=', '1'],
						])
						->select(['PROSPECTOS.PROS_ID as PROSP',
							'CONT_FECHAINGRESO',
							'ESCO_ID',
						])->get();
	    return response()->json($data);
	}

	

	/**
	 * Show the form for creating a new Ausentismo.
	 *
	 * @return Response
	 */
	public function create()
	{
		$CONT_PROSPECTOS = expression_concat([
			'PROS_PRIMERNOMBRE',
			'PROS_SEGUNDONOMBRE',
			'PROS_PRIMERAPELLIDO',
			'PROS_SEGUNDOAPELLIDO',
			'PROS_CEDULA',
			'CONT_FECHAINGRESO',
		], 'CONT_PROSPECTOS');

		$contratos = Contrato::join('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')
					->select(['CONT_ID', $CONT_PROSPECTOS])
					->get();

		//Se crea un array con los prospectos disponibles
		$arrContratos = model_to_array($contratos, 'CONT_PROSPECTOS');
		
		//Se crea un array con los conceptos de Ausentismos
		$arrConceptoAusentismo= model_to_array(ConceptoAusencia::class, 'COAU_DESCRIPCION');
		
		//Se crea un array con las Entidades Responsables
		$arrEntidad= model_to_array(Entidad::class, 'ENTI_RAZONSOCIAL');
		
		return view($this->view.'.'.$this->route.'.create',compact('arrContratos','arrConceptoAusentismo','arrEntidad'));
	}

	

	/**
	 * Store a newly created Ausentismo in storage.
	 *
	 * @param CreateAusentismoRequest $request
	 *
	 * @return Response
	 */
	public function store()
	{
		parent::storeModel();
	}

	/**
	 * Display the specified Ausentismo.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show(Ausentismo $ausentismo){
	}

	/**
	 * Show the form for editing the specified Ausentismo.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit(Ausentismo $ausentismo)
	{
		$CONT_PROSPECTOS = expression_concat([
		'PROS_PRIMERNOMBRE',
		'PROS_SEGUNDONOMBRE',
		'PROS_PRIMERAPELLIDO',
		'PROS_SEGUNDOAPELLIDO',
		'PROS_CEDULA',
		'CONT_FECHAINGRESO',
		], 'CONT_PROSPECTOS');

		$contratos = Contrato::join('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')
					->select(['CONT_ID', $CONT_PROSPECTOS])
					->get();

		//Se crea un array con los prospectos disponibles
		$arrContratos = model_to_array($contratos, 'CONT_PROSPECTOS');
				$contratos = Contrato::join('PROSPECTOS', 'PROSPECTOS.PROS_ID', '=', 'CONTRATOS.PROS_ID')->get();
		//Se crea un array con los conceptos de Ausentismos
		$arrConceptoAusentismo= model_to_array(ConceptoAusencia::class, 'COAU_DESCRIPCION');
		
		//Se crea un array con las Entidades Responsables
		$arrEntidad= model_to_array(Entidad::class, 'ENTI_RAZONSOCIAL');


		$diagnostico= Diagnostico::where('DIAG_ID','=',$ausentismos->DIAG_ID)->get();


		return view($this->view.'.'.$this->route.'.edit',compact('ausentismo','diagnostico','arrContratos','arrConceptoAusentismo','arrEntidad'));
	}

	/**
	 * Update the specified Ausentismo in storage.
	 *
	 * @param  int              $id
	 * @param UpdateAusentismoRequest $request
	 *
	 * @return Response
	 */
	public function update($id)
	{
		parent::updateModel($id);
	}

	/**
	 * Remove the specified Ausentismo from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		parent::destroyModel($id);
	}
}