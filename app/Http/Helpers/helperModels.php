<?php 

if (! function_exists('modelo')) {
    /**
     * info
     * 
     *
     * @param  type  $obj
     * @return 
     */
	function modelo($modelo){ 	
		$class = class_exists($modelo) ? $modelo : '\\SGH\\Models\\'.basename($modelo);
		return (new $class);
	}
}


if (! function_exists('repositorio')) {
    /**
     * info
     * 
     *
     * @param  type  $obj
     * @return 
     */
	function repositorio($modelo){ 
		$repositori = $modelo."Repository";
		$class = class_exists($repositori) ? $repositori : '\\SGH\\Repositories\\'.$repositori;
		return (new $class);
	}
}

if (! function_exists('findAll')) {
    /**
     * info
     * 
     *
     * @param  type  $obj
     * @return 
     */
	function findAll($modelo,$relacion=null){
		$modelo = modelo($modelo);
        if (isset($relacion))
			return $modelo::with($relacion)->get();
		return $modelo::all();
	}
}

if (! function_exists('findId')) {
    /**
     * info
     * 
     *
     * @param  type  $obj
     * @return 
     */
	function findId($modelo,$id,$relacion=null)
    {
		//$modelo = modelo($modelo);
        if (isset($relacion))
            return modelo($modelo)->with($relacion)->find($id);
        return modelo($modelo)->find($id);
    }
}
    
if (! function_exists('findBy')) {
    /**
     * info
     * 
     *
     * @param  type  $obj
     * @return 
     */
    function findBy($modelo,$column, $value,$relacion=null)
    {
        if (isset($relacion))
            return modelo($modelo)->where($column, $value)->with($relacion)->get();
      return modelo($modelo)->where($column, $value)->get();
    }
   
}

if (! function_exists('getEnumValues')) {
    /**
     * Funcion para obtener los posibles datos de una columna en la base de datos
     * 
     *
     * @param  type  $obj
     * @return 
     */ 

    function getEnumValues($table, $column)
    {
      $type = DB::select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = '{$column}'"))[0]->Type ;
      preg_match('/^enum\((.*)\)$/', $type, $matches);
      $enum = array();
      foreach( explode(',', $matches[1]) as $value )
      {
        $v = trim( $value, "'" );
        $enum = array_add($enum, $v, $v);
      }
      return $enum;
    }


}

if (! function_exists('meses')) {
    /**
     * Funcion para retornar los meses del año
     * 
     *
     * 
     * @return 
     */ 

    function meses()
    {
        return ['ENERO'=>'ENERO',
                'FEBRERO'=>'FEBRERO',
                'MARZO'=>'MARZO',
                'ABRIL'=>'ABRIL',
                'MAYO'=>'MAYO',
                'JUNIO'=>'JUNIO',
                'JULIO'=>'JULIO',
                'AGOSTO'=>'AGOSTO',
                'SEPTIEMBRE'=>'SEPTIEMBRE',
                'OCTUBRE'=>'OCTUBRE',
                'NOVIEMBRE'=>'NOVIEMBRE',
                'DICIEMBRE'=>'DICIEMBRE'];
    }

    
}