@extends('layouts.admin')
@section('title', '/ Motivos Retiros')
@include('datatable')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Motivos de Retiros
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('admin.motivosretiros.create') }}" data-tooltip="tooltip" title="Crear C.N.O">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
@endsection

@section('section')

	{{-- Paginate --}}
	<div class="row">
		<div id="btn-paginate" class="col-xs-12 col-md-8 col-lg-8">
			{{ $motivosretiros->appends(Request::all())->render() }}
		</div>
		<div class="col-xs-12 col-md-4 col-lg-4 text-right">
			{{$motivosretiros->total()}} registros encontrados.
		</div>
	</div>

	<table class="table table-striped" id="tabla">
		<thead>
			<tr>
				<th class="col-md-5">@sortablelink('MORE_DESCRIPCION', 'Descripción')</th>
				<th class="col-md-5">@sortablelink('MORE_OBSERVACIONES', 'Observaciones')</th>
				<th class="hidden-xs col-md-2">@sortablelink('MORE_CREADOPOR', 'Creado por')</th>
				<th class="col-md-1"></th>
			</tr>
		</thead>

		<tbody>
			@foreach($motivosretiros as $motivoretiro)
			<tr>
				<td>{{ $motivoretiro -> MORE_DESCRIPCION }}</td>
				<td>{{ $motivoretiro -> MORE_OBSERVACIONES }}</td>
				<td>{{ $motivoretiro -> MORE_CREADOPOR }}</td>
				<td>
					<!-- Botón Editar (edit) -->
					<a class="btn btn-small btn-info btn-xs" href="{{ route('admin.motivosretiros.edit', [ 'MORE_ID' => $motivoretiro->MORE_ID ] ) }}" data-tooltip="tooltip" title="Editar">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>

					<!-- carga botón de borrar -->
					{{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>',[
						'name'=>'btn-delete',
						'class'=>'btn btn-xs btn-danger',
						'data-toggle'=>'modal',
						'data-id'=> $motivoretiro->MORE_ID,
						'data-modelo'=> str_upperspace(class_basename($motivoretiro)),
						'data-descripcion'=> $motivoretiro->MORE_DESCRIPCION,
						'data-action'=>'motivosretiros/'. $motivoretiro->MORE_ID,
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