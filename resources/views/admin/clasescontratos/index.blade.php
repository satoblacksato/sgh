@extends('layouts.admin')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Clases de contratos
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('admin.clasescontratos.create') }}" data-tooltip="tooltip" title="Crear C.N.O">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
@endsection

@section('section')

	{{-- Paginate --}}
	<div class="row">
		<div id="btn-paginate" class="col-xs-12 col-md-8 col-lg-8">
			{{ $clasescontratos->appends(Request::all())->render() }}
		</div>
		<div class="col-xs-12 col-md-4 col-lg-4 text-right">
			{{$clasescontratos->total()}} registros encontrados.
		</div>
	</div>

	<table class="table table-striped">
		<thead>
			<tr>
				<th class="col-md-5">@sortablelink('CLCO_DESCRIPCION', 'Descripción')</th>
				<th class="col-md-5">@sortablelink('CLCO_OBSERVACIONES', 'Observaciones')</th>
				<th class="hidden-xs col-md-2">@sortablelink('CLCO_CREADOPOR', 'Creado por')</th>
				<th class="col-md-1"></th>
			</tr>
		</thead>

		<tbody>
			@foreach($clasescontratos as $clasecontrato)
			<tr>
				<td>{{ $clasecontrato -> CLCO_DESCRIPCION }}</td>
				<td>{{ $clasecontrato -> CLCO_OBSERVACIONES }}</td>
				<td>{{ $clasecontrato -> CLCO_CREADOPOR }}</td>
				<td>
					<!-- Botón Editar (edit) -->
					<a class="btn btn-small btn-info btn-xs" href="{{ route('admin.clasescontratos.edit', [ 'CLCO_ID' => $clasecontrato->CLCO_ID ] ) }}" data-tooltip="tooltip" title="Editar">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>

					<!-- carga botón de borrar -->
					{{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
						'name'=>'btn-delete',
						'class'=>'btn btn-xs btn-danger',
						'data-toggle'=>'modal',
						'data-id'=> $clasecontrato->CLCO_ID,
						'data-modelo'=> str_upperspace(class_basename($clasecontrato)),
						'data-descripcion'=> $clasecontrato->CLCO_DESCRIPCION,
						'data-action'=>'clasescontratos/'. $clasecontrato->CLCO_ID,
						'data-target'=>'#pregModalDelete',
						'data-tooltip'=>'tooltip',
						'title'=>'Borrar',
					])}}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	@include('widgets/modal-delete')
@endsection