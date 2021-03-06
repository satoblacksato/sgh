<?php

namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class EstadoTicket extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'ESTADOSTICKETS';
	protected $primaryKey = 'ESTI_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'ESTI_FECHACREADO';
	const UPDATED_AT = 'ESTI_FECHAMODIFICADO';
	const DELETED_AT = 'ESTI_FECHAELIMINADO';
	protected $dates = ['ESTI_FECHACREADO', 'ESTI_FECHAMODIFICADO', 'ESTI_FECHAELIMINADO'];

	protected $fillable = [
		'ESTI_DESCRIPCION',
		'ESTI_COLOR',
		'ESTI_OBSERVACIONES',
	];

	//Constantes para referenciar los estados de un ticket
	const ABIERTO	 = 1;
	const REASIGNADO = 2;
	const CERRADO    = 3;

	public static function rules($id = 0){
		return [
			'ESTI_DESCRIPCION' => ['required', 'max:100', 'unique:ESTADOSTICKETS,ESTI_DESCRIPCION,'.$id.',ESTI_ID'],
			'ESTI_COLOR' => ['required', 'max:100'],
			'ESTI_OBSERVACIONES' => ['max:300'],
		];
	}

}
