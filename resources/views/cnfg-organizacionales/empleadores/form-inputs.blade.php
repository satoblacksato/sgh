{{--@include('datapicker')--}}
@include('chosen')

@include('widgets.forms.group', ['type'=>'text', 'name'=>'EMPL_RAZONSOCIAL', 'label'=>'Razón Social', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.group', ['type'=>'number', 'name'=>'EMPL_NIT', 'label'=>'NIT', 'options'=>['size' => '999999999999999' ] ])

@include('widgets.forms.group', ['type'=>'text', 'name'=>'EMPL_DIRECCION', 'label'=>'Dirección', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'CIUD_DOMICILIO', 'label'=>'Ciudad', 'data'=>$arrCiudades])

@include('widgets.forms.group', ['type'=>'text', 'name'=>'EMPL_NOMBRECOMERCIAL', 'label'=>'Nombre Comercial', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.group', ['type'=>'text', 'name'=>'EMPL_NOMBREREPRESENTANTE', 'label'=>'Nombre Representante Legal', 'options'=>['maxlength' => '100'] ])

@include('widgets.forms.group', ['type'=>'number', 'name'=>'EMPL_CEDULAREPRESENTANTE', 'label'=>'Cedula Representante', 'options'=>['size' => '999999999999999' ] ])

@include('widgets.forms.group', ['type'=>'select', 'name'=>'CIUD_CEDULA', 'label'=>'Ciudad de Expedición', 'data'=>$arrCiudades])

@include('widgets.forms.group', ['type'=>'email', 'name'=>'EMPL_COREO', 'label'=>'Correo electrónico responsable G.H'])

@include('widgets.forms.group', [ 'type'=>'textarea', 'name'=>'EMPL_OBSERVACIONES', 'label'=>'Observaciones', 'options'=>['maxlength' => '300'] ])