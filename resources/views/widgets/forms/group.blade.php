<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
	{{ Form::label($name, $label,  [ 'class' => 'control-label' ]) }}
	@include('widgets.forms.input-'.$type, compact('name','options','data', 'multiple'))
	@if ($errors->has($name))
		<span class="help-block">
			<strong>{{ $errors->first($name) }}</strong>
		</span>
	@endif
</div>
{{-- <div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
	{{ Form::label($name, $label,  [ 'class' => 'col-md-4 control-label' ]) }}
	<div class="col-md-6">
		@include('widgets.forms.input-'.$type, compact('name','options','data', 'multiple'))
		@if ($errors->has($name))
		<span class="help-block">
			<strong>{{ $errors->first($name) }}</strong>
		</span>
		@endif
	</div>
</div> --}}