{{--@include('datepicker')--}}
{{-- @include('chosen')--}}
@include('select-color')
<div class='col-md-8 col-md-offset-2'>

@include('widgets.forms.input', ['type'=>'text', 'name'=>'TIIN_DESCRIPCION', 'label'=>'Descripción', 'options'=>['maxlength' => '100', 'required'] ])

@include('widgets.forms.input', [ 'type'=>'textarea', 'name'=>'TIIN_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])

</div>