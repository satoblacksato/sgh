<?php

namespace SGH;

use SGH\ModelWithSoftDeletes;

class Contrato extends ModelWithSoftDeletes
{
	
	//Nombre de la tabla en la base de datos
	protected $table = 'CONTRATOS';
	protected $primaryKey = 'CONT_ID';

	//Traza: Nombre de campos en la tabla para auditoría de cambios
	const CREATED_AT = 'CONT_FECHACREADO';
	const UPDATED_AT = 'CONT_FECHAMODIFICADO';
	const DELETED_AT = 'CONT_FECHAELIMINADO';
	protected $dates = ['CONT_FECHACREADO', 'CONT_FECHAMODIFICADO', 'CONT_FECHAELIMINADO'];

	protected $fillable = [
		'PROS_ID',
		'CONT_CASOMEDICO',
		'CARG_ID',
		'CONT_FECHAINGRESO',
		'CONT_FECHARETIRO',
		'CONT_SALARIO',
		'CONT_VARIABLE',
		'CONT_RODAJE',
		'ESCO_ID',
		'MORE_ID',
		'TICO_ID',
		'CLCO_ID',
		'EMPL_ID',
		'TIEM_ID',
		'CECO_ID',
		'CONT_OBSERVACIONES',
	];

	public function prospecto()
	{
		$foreingKey = 'PROS_ID';
		return $this->belongsTo(Prospecto::class, $foreingKey);
	}

	public function cargo()
	{
		$foreingKey = 'CARG_ID';
		return $this->belongsTo(Cargo::class, $foreingKey);
	}

	public function estadocontrato()
	{
		$foreingKey = 'ESCO_ID';
		return $this->belongsTo(Estadoscontrato::class, $foreingKey);
	}

	public function motivoretiro()
	{
		$foreingKey = 'MORE_ID';
		return $this->belongsTo(Motivoretiro::class, $foreingKey);
	}

	public function tipocontrato()
	{
		$foreingKey = 'TICO_ID';
		return $this->belongsTo(Tipocontrato::class, $foreingKey);
	}

	public function clasecontrato()
	{
		$foreingKey = 'CLCO_ID';
		return $this->belongsTo(Clasescontrato::class, $foreingKey);
	}

	public function empleador()
	{
		$foreingKey = 'EMPL_ID';
		return $this->belongsTo(Empleadore::class, $foreingKey);
	}

	public function tipoempleador()
	{
		$foreingKey = 'TIEM_ID';
		return $this->belongsTo(Tiposempleadore::class, $foreingKey);
	}

	public function centrocosto()
	{
		$foreingKey = 'CECO_ID';
		return $this->belongsTo(Centroscosto::class, $foreingKey);
	}

}