<?php
namespace SGH\Models;

use SGH\Models\ModelWithSoftDeletes;

class Entidad extends ModelWithSoftDeletes
{
    
    //Nombre de la tabla en la base de datos   
    protected $table = "ENTIDADES";
    protected $primaryKey =  'ENTI_ID';

    //Traza: Nombre de campos en la tabla para auditoría de cambios
    const CREATED_AT = 'ENTI_FECHACREADO';
    const UPDATED_AT = 'ENTI_FECHAMODIFICADO';
    const DELETED_AT = 'ENTI_FECHAELIMINADO';
    protected $dates = ['ENTI_FECHACREADO','ENTI_FECHAMODIFICADO','ENTI_FECHAELIMINADO'];

    public $fillable = [
        "ENTI_CODIGO",
		"ENTI_NIT",
		"ENTI_RAZONSOCIAL",
		"ENTI_OBSERVACIONES",
		"TIEN_ID"
    ];


    public static $rules = [
        "ENTI_CODIGO" => "unique:ENTIDADES|required",
		"ENTI_NIT" => "unique:ENTIDADES|required",
		"ENTI_RAZONSOCIAL" => "unique:ENTIDADES|required",
		"TIEN_ID" => "required|numeric"
    ];

    public static function rules($id = 0){
        return [
            //'CARG_DESCRIPCION' => 'required|max:100|'.static::unique($id,'CARG_DESCRIPCION'),
        
        ];
    }

    public function tipoentidad()
    {
        $foreingKey = 'TIEN_ID';
        return $this->belongsTo(TipoEntidad::class, $foreingKey);
    }

    public function contratos(){
        $foreingKey = 'ENTI_ID';
        $otherKey   = 'CONT_ID';
        return $this->belongsToMany(Contrato::class, 'CONTRATO_ENTIDAD', $foreingKey, $otherKey);
    }

    public function ausentismos()
    {
        $foreingKey = 'AUSE_ID';
        return $this->hasMany(Ausentismo::class, $foreingKey);
    }


}
