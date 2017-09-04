{{--@include('datepicker')--}}
@include('chosen')

@include('widgets.forms.input', ['type'=>'text', 'name'=>'name', 'label'=>'Nombre interno', 'options'=>['maxlength' => '15'] ])

@include('widgets.forms.input', ['type'=>'text', 'name'=>'display_name', 'label'=>'Nombre para mostrar', 'options'=>['maxlength' => '50'] ])

@include('widgets.forms.input', ['type'=>'select', 'name'=>'roles_ids', 'label'=>'Roles', 'data'=>$arrRoles, 'multiple'=>true, 'options'=>['data-live-search'=>'true']])

@include('widgets.forms.input', [ 'type'=>'textarea', 'name'=>'description', 'label'=>'Descripción', 'options'=>['maxlength' => '100'] ])
