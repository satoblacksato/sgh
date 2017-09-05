{{ Form::select(
	isset($multiple) && $multiple ?$name.'[]':$name,
	(isset($multiple) && $multiple ? []:[''=>'']) + (isset($data)?$data:[]) , 
	isset($value)? $value:old($name),
	[
		'id'=>$name,
		'class'=>'form-control '.(isset($selectpicker)?'':'selectpicker').(isset($readonly) && $readonly ?' readonly':''),
		'data-size'=>5
	] + (isset($options)?$options:[]) + (isset($multiple) && $multiple ? ['multiple']:[])
) }}

@if(is_array(old($name)) or isset(${$name}))
@push('scripts')
<script type="text/javascript">
	$('#{{$name}}')
		.val(
			{{ ((old($name)!=null or old($name)!='') and is_array(old($name)))
				? json_encode(array_map('intval', old($name)))
				: (isset(${$name})?''.${$name}:'')
			}}
		);
</script>
@endpush
@endif
