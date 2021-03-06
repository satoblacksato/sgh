@include('datepicker')
@include('chosen')
@rinclude('validacion-contratos')

@include('widgets.select-dinamico', ['url'=>'gestion-humana/buscaGerencia', 'selectPadre'=>'EMPL_ID', 'selectHijo'=>'GERE_ID', 'idBusqueda'=>'GERE_ID', 'nombreBusqueda'=>'GERE_DESCRIPCION', 'prepend'=>'Seleccione una Gerencia'])

@include('widgets.select-dinamico', ['url'=>'gestion-humana/buscaGrupo', 'selectPadre'=>'EMPL_ID', 'selectHijo'=>'GRUP_ID', 'idBusqueda'=>'GRUP_ID', 'nombreBusqueda'=>'GRUP_DESCRIPCION', 'prepend'=>'Seleccione un Grupo'])

@include('widgets.select-dinamico', ['url'=>'gestion-humana/buscaTurno', 'selectPadre'=>'EMPL_ID', 'selectHijo'=>'TURN_ID', 'idBusqueda'=>'TURN_ID', 'nombreBusqueda'=>'TURN_DESCRIPCION', 'prepend'=>'Seleccione un Turno'])

@include('widgets.select-dinamico', ['url'=>'gestion-humana/buscaCentroCosto', 'selectPadre'=>'GERE_ID', 'selectHijo'=>'CECO_ID', 'idBusqueda'=>'CECO_ID', 'nombreBusqueda'=>'CECO_DESCRIPCION', 'prepend'=>'Seleccione un Centro de Costo'])

@include('widgets.select-dinamico', ['url'=>'gestion-humana/buscaNegocio', 'selectPadre'=>'EMPL_ID', 'selectHijo'=>'NEGO_ID', 'idBusqueda'=>'NEGO_ID', 'nombreBusqueda'=>'NEGO_DESCRIPCION', 'prepend'=>'Seleccione un Negocio'])


<div class='col-md-8 col-md-offset-2'>
@include('widgets.forms.input', ['type'=>'select', 'name'=>'EMPL_ID', 'label'=>'Empleador', 'data'=>$arrEmpleadores])

@include('widgets.forms.input', ['type'=>'select', 'name'=>'NEGO_ID', 'label'=>'Negocio', 'data'=>$arrNegocios])

@include('widgets.forms.input', ['type'=>'select', 'name'=>'PROS_ID', 'label'=>'Prospecto', 'data'=>$arrProspectos])

@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'TIEM_ID', 'label'=>'Tipo de empleador', 'data'=>$arrTiposempleadores])
@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'GERE_ID', 'label'=>'Gerencia', 'data'=>$arrGerencias])

@include('widgets.forms.input', ['type'=>'select', 'name'=>'TEMP_ID', 'label'=>'Temporal', 'data'=>$arrTemporales])

@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'CECO_ID', 'label'=>'Centro de costo', 'data'=>$arrCentroscostos])

@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'ESCO_ID', 'label'=>'Estado de contrato', 'data'=>$arrEstadoscontrato])
@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'TICO_ID', 'label'=>'Tipo de contrato', 'data'=>$arrTiposcontrato])

@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'CLCO_ID', 'label'=>'Clase de contrato', 'data'=>$arrClasescontrato])
@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'RIES_ID', 'label'=>'Riesgo ARL', 'data'=>$arrRiesgos])

@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'CARG_ID', 'label'=>'Cargo', 'data'=>$arrCargos])

<div class="col-md-13">
@include('widgets.forms.input', ['type'=>'date', 'column'=>6, 'name'=>'CONT_FECHAINGRESO', 'label'=>'Fecha de Ingreso' ])
</div>

<div class="col-md-13">
@include('widgets.forms.input', ['type'=>'date', 'column'=>6, 'name'=>'CONT_FECHATERMINACION', 'label'=>'Fecha Fin de Contrato' ])
</div>

<div class="col-md-13 ">

@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'CIUD_CONTRATA', 'label'=>'Ciudad de Contratación', 'data'=>$arrCiudades])
@include('widgets.forms.input', ['type'=>'select', 'column'=>6, 'name'=>'CIUD_SERVICIO', 'label'=>'Ciudad de Servicio', 'data'=>$arrCiudades])

@if(current_route_action() == 'edit')
@include('widgets.forms.input', ['type'=>'date', 'column'=>4, 'name'=>'CONT_FECHARETIRO', 'label'=>'Fecha de Retiro' ])
@include('widgets.forms.input', ['type'=>'select', 'column'=>8, 'name'=>'MORE_ID', 'label'=>'Motivo de Retiro', 'data'=>$arrMotivosretiro])
@endif

<div class="col-md-13 ">
	@include('widgets.forms.input', ['type'=>'number', 'column'=>4, 'name'=>'CONT_SALARIO', 'label'=>'Salario', 'options'=>['size' => '99999999999999' ] ])
	@include('widgets.forms.input', ['type'=>'number', 'column'=>4, 'name'=>'CONT_VARIABLE', 'label'=>'Variable', 'options'=>['size' => '99999999999999' ] ])
	@include('widgets.forms.input', ['type'=>'number', 'column'=>4, 'name'=>'CONT_RODAJE', 'label'=>'Rodaje', 'options'=>['size' => '99999999999999' ] ])
</div>

@include('widgets.forms.input', ['type'=>'select', 'column'=>8, 'name'=>'GRUP_ID', 'label'=>'Grupo de Empleado', 'data'=>$arrGrupos])
@include('widgets.forms.input', ['type'=>'select', 'column'=>4, 'name'=>'TURN_ID', 'label'=>'Turno', 'data'=>$arrTurnos])

@include('widgets.forms.input', ['type'=>'select', 'column'=>10, 'name'=>'JEFE_ID', 'label'=>'Jefe Inmediato', 'data'=>$arrJefes])
@include('widgets.forms.input', ['type'=>'select', 'column'=>2, 'name'=>'CONT_CASOMEDICO', 'label'=>'¿R.M?', 'data'=>['NO' => 'NO', 'SI' => 'SI']])

@include('widgets.forms.input', ['type'=>'select', 'column'=>12, 'name'=>'REMP_ID', 'label'=>'Remplaza a', 'data'=>$arrRetirados])

@include('widgets.forms.input', [ 'type'=>'textarea', 'name'=>'CONT_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])

@include('widgets.forms.input', ['type'=>'select', 'name'=>'ENTI_ID_eps', 'label'=>'EPS', 'data'=>$arrEPS])

@include('widgets.forms.input', ['type'=>'select', 'name'=>'ENTI_ID_arl', 'label'=>'ARL', 'data'=>$arrARL])

@include('widgets.forms.input', ['type'=>'select', 'name'=>'ENTI_ID_ccf', 'label'=>'Caja de Compensacion', 'data'=>$arrCCF])

</div>