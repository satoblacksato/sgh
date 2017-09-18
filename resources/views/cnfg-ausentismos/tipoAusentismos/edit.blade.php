@extends('layouts.menu')

@section('page_heading', 'Actualizar Tipo de Ausentismo')

@section('section')
	{{ Form::model($tipoAusentismo, ['route' => ['tipoausentismos.update', $tipoAusentismo ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<!-- Elementos del formulario -->
		@rinclude('fields')

		<!-- Botones -->
		@include('widgets.forms.buttons', ['url' => 'cnfg-ausentismos/tipoausentismos'])

	{{ Form::close() }}
@endsection