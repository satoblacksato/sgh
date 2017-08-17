@extends('layouts.menu')
@section('title', '/ Ciudades')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Ciudades
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
			<a class='btn btn-primary' role='button' href="{{ route('cnfg-geograficos.ciudades.create') }}" data-tooltip="tooltip" title="Crear Nuevo">
				<i class="fa fa-plus" aria-hidden="true"></i>
			</a>
		</div>
	</div>
@endsection

@section('section')

	<table class="table table-striped" id="tabla">
		<thead>
			<tr>
				<th class="col-md-1">Código</th>
				<th class="col-md-4">Nombre</th>
				<th class="col-md-4">Departamento</th>
				<th class="hidden-xs col-md-1">Creado</th>
				<th class="col-md-1 all">Acciones</th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>

	@include('widgets/modal-delete')
	@include('datatable-ajax', ['urlAjax'=>'getCiudades', 'columns'=>[
		'CIUD_CODIGO',
		'CIUD_NOMBRE',
		'departamento.DEPA_NOMBRE',
		'CIUD_CREADOPOR',
		'action',
	]])	
@endsection
