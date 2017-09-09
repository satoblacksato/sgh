<table class="table table-striped" id="tabla">
    <thead>
        <th>Diagnostico</th>
		<th>Concepto Ausentismo</th>
		<th>Contrato</th>
		<th>Fecha Inicio</th>
		<th>Fecha Final</th>
		<th>Total Dias</th>
		<th>Fecha Accidente</th>
		<th>Entidad</th>
		<th>IBC</th>
		<th>Valor Total</th>
		<th>Observaciones</th>
        <th class="col-md-1 all" width="50px">Acciones</th>
    </thead>
    <tbody>
    @foreach($ausentismos as $ausentismo)
        <tr>
            <td>{!! $ausentismo->DIAG_ID !!}</td>
			<td>{!! $ausentismo->COAU_ID !!}</td>
			<td>{!! $ausentismo->CONT_ID !!}</td>
			<td>{!! $ausentismo->AUSE_FECHAINICIO !!}</td>
			<td>{!! $ausentismo->AUSE_FECHAFINAL !!}</td>
			<td>{!! $ausentismo->AUSE_DIAS !!}</td>
			<td>{!! $ausentismo->AUSE_FECHAACCIDENTE !!}</td>
			<td>{!! $ausentismo->ENTI_ID !!}</td>
			<td>{!! $ausentismo->AUSE_IBC !!}</td>
			<td>{!! $ausentismo->AUSE_VALOR !!}</td>
			<td>{!! $ausentismo->AUSE_OBSERVACIONES !!}</td>
             <td>
                <!-- Botón Editar (edit) -->
                <a class="btn btn-small btn-info btn-xs" href="{{ route('ausentismos.edit', [ $ausentismo->AUSE_ID ] ) }}" data-tooltip="tooltip" title="Editar">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </a>

                <!-- carga botón de borrar -->
                {{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
                    'class'=>'btn btn-xs btn-danger btn-delete',
                    'data-toggle'=>'modal',
                    'data-id'=> $ausentismo->AUSE_ID,
                    'data-modelo'=> str_upperspace(class_basename($ausentismo)),
                    'data-descripcion'=> $ausentismo->AUSE_NOMBRE,
                    'data-action'=>'ausentismos/'. $ausentismo->AUSE_ID,
                    'data-target'=>'#pregModalDelete',
                    'data-tooltip'=>'tooltip',
                    'title'=>'Borrar',
                ])}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>