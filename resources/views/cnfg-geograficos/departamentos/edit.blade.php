@extends('layouts.menu')

@section('page_heading', 'Actualizar Departamento '.$departamento->DEPA_ID)

@section('section')

	{{ Form::model($departamento, ['action' => ['DepartamentoController@update', $departamento->DEPA_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<div class="form-group{{ $errors->has('DEPA_CODIGO') ? ' has-error' : '' }}">
			{{ Form::label('DEPA_CODIGO', 'Código',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('DEPA_CODIGO', old('DEPA_CODIGO'), [ 'class' => 'form-control', 'maxlength' => '25', 'required' ]) }}
				@if ($errors->has('DEPA_CODIGO'))
					<span class="help-block">
						<strong>{{ $errors->first('DEPA_CODIGO') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('DEPA_DESCRIPCION') ? ' has-error' : '' }}">
			{{ Form::label('DEPA_DESCRIPCION', 'Descripción',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('DEPA_DESCRIPCION', old('DEPA_DESCRIPCION'), [ 'class' => 'form-control', 'maxlength' => '25', 'required' ]) }}
				@if ($errors->has('DEPA_DESCRIPCION'))
					<span class="help-block">
						<strong>{{ $errors->first('DEPA_DESCRIPCION') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('cnfg-geograficos/departamentos/') }}" data-tooltip="tooltip" title="Regresar">
					<i class="fa fa-arrow-left" aria-hidden="true"></i>
				</a>
				{{ Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', [
					'class'=>'btn btn-primary',
					'type'=>'submit',
					'data-tooltip'=>'tooltip',
					'title'=>'Guardar',
				]) }}
			</div>
		</div>
	{{ Form::close() }}
@endsection