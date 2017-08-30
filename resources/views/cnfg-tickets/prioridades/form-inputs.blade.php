{{--@include('datepicker')--}}
 @include('chosen')
@include('select-color')
<div class='col-md-8 col-md-offset-2'>

@include('widgets.forms.input', ['type'=>'text', 'column'=>11, 'name'=>'PRIO_DESCRIPCION', 'label'=>'Descripción', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.input', ['type'=>'color', 'column'=>1, 'name'=>'PRIO_COLOR', 'label'=>'Color'])

@include('widgets.forms.input', [ 'type'=>'textarea', 'name'=>'PRIO_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])

</div>