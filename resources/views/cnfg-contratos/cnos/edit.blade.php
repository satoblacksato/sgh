@extends('layouts.menu')

@section('page_heading', 'Actualizar Clasif. de Ocupación '.$cno->CNOS_ID)

@section('section')

	{{ Form::model($cno, ['action' => ['CnosController@update', $cno->CNOS_ID ], 'method' => 'PUT', 'class' => 'form-horizontal' ]) }}

		<div class="form-group{{ $errors->has('CNOS_CODIGO') ? ' has-error' : '' }}">
			{{ Form::label('CNOS_CODIGO', 'Código',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('CNOS_CODIGO', old('CNOS_CODIGO'), [ 'class' => 'form-control', 'maxlength' => '25', 'required' ]) }}
				@if ($errors->has('CNOS_CODIGO'))
					<span class="help-block">
						<strong>{{ $errors->first('CNOS_CODIGO') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('CNOS_DESCRIPCION') ? ' has-error' : '' }}">
			{{ Form::label('CNOS_DESCRIPCION', 'Descripción',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::text('CNOS_DESCRIPCION', old('CNOS_DESCRIPCION'), [ 'class' => 'form-control', 'maxlength' => '100', 'required' ]) }}
				@if ($errors->has('CNOS_DESCRIPCION'))
					<span class="help-block">
						<strong>{{ $errors->first('CNOS_DESCRIPCION') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('CNOS_DESCRIPCION') ? ' has-error' : '' }}">
			{{ Form::label('CNOS_OBSERVACIONES', 'Observaciones',  [ 'class' => 'col-md-4 control-label' ]) }}
			<div class="col-md-6">
				{{ Form::textarea('CNOS_OBSERVACIONES', old('CNOS_OBSERVACIONES'), [ 'class' => 'form-control', 'maxlength' => '300']) }}
				@if ($errors->has('CNOS_OBSERVACIONES'))
					<span class="help-block">
						<strong>{{ $errors->first('CNOS_OBSERVACIONES') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<!-- Botones -->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4 text-right">
				<a class="btn btn-warning" role="button" href="{{ URL::to('cnfg-contratos/cnos/') }}" data-tooltip="tooltip" title="Regresar">
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