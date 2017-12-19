@extends('layouts.menu')
@section('title', '/ Reportes')

@include('widgets.datatable.datatable-export')
@include('datepicker')

@section('page_heading')
	<div class="row">
		<div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
			Reportes
		</div>
		<div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
		</div>
	</div>
@endsection

@section('section')

	@include('widgets.forms.input', ['type'=>'select', 'column'=>4, 'name'=>'REPO_ID', 'label'=>'Seleccionar reporte', 'data'=>$arrReportes])
	
	<div class="row">
		<div class="col-sm-12">
			@foreach($arrReportes as $key => $reporte)
				{{ Form::open(['url' => 'reportes/'.$key, 'id'=>'form_'.$key, 'class' => 'form-horizontal hide']) }}
					<div class="col-sm-8 col-offset-2" >
						@rinclude('formRep'.$key.'')
						@rinclude('formRepBotones')
					</div>
				{{ Form::close() }}
			@endforeach
		</div>
	</div>

	<table id="tabla" class="table table-striped">
		<thead><tr><th></th></tr></thead>
		<tbody><tr><td></td></tr></tbody>
	</table>

	<code id="err"></code>
@endsection


@push('scripts')
<script type="text/javascript">

	$(function () {
		var forms = $('form');
		var tbQuery = $('#tabla');
		//tbQuery.wrap('<div id="hide" style="display:none"/>');
		var divErr = $('#err');

		//Select para formularios
		$('#REPO_ID').change(function() {
			$(document).attr("title", $(this).find(':selected').text());
			forms.addClass('hide');
			var id_selected = $(this).val();
			$('#form_'+id_selected).removeClass('hide');
			clearTable();
		});

		//Reset de formulario
		$('form').on('reset', function() {
			clearTable();
		});

		$("form").submit(function(e) {
			e.preventDefault(); // avoid to execute the actual submit of the form.
			clearTable();

			var thisForm = $(this);
		    var url = thisForm.attr('action');

		    $.ajax({
				type: 'POST',
				url: url,
				data: thisForm.serialize(), // serializes the form's elements.
				dataType: 'json',
		    }).done(function( data, textStatus, jqXHR ) {
				//console.log('Response: '+JSON.stringify(textStatus));
				//$('#response').html(data);
				if ( data.length != 0 )
					buildDataTable(data);
				else
					divErr.html('No se encontraron registros.');

			})
			.fail(function( jqXHR, textStatus, errorThrown ) {
				//console.log('Err: '+JSON.stringify(jqXHR));
				$('#err').html(event.responseText);
			})
			.always(function( data, textStatus, jqXHR ) {
				/*var msgErr = $('#err').html();
				//console.log('proc: '+i+' de '+cantRows+'('+porcent+'%)');
				if (jqXHR === 'Forbidden') {
					msgErr = 'Error en la conexión con el servidor. Presione F5.';
				}else if (typeof jqXHR.responseJSON === 'undefined')
					msgErr = 'NetworkError: 500 Internal Server Error.';
				divErr.html(msgErr);*/

				thisForm.find("button[type=submit]").attr('disabled', false);
				$('body').css('cursor', 'auto');
				$('#msgModalLoading').modal('hide');
			});

		});


		//Construye la tabla con el Json recibido
		function buildDataTable(dataJson){
			var columns = Object.keys(dataJson[0]);
			var thead = tbQuery.find('thead');
			var tbody = tbQuery.find('tbody');

			var tr = $('<tr>');
		    $.each(columns, function(i, item) {
		        tr.append( $('<th>').text(item));
		    });
		    tr.appendTo(thead);

		    $.each(dataJson, function(i, row) {
		    	var tr = $('<tr>');
				$.each(row, function(j, cel) {
		            $('<td>').text(cel).appendTo(tr);
				});
				tr.appendTo(tbody);
		    });
		    tbQuery.DataTable();

		    //$('#hide').css( 'display', 'block' );
		    //$.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust().draw();
		    //$.fn.dataTable.tables( { visible: true, api: true } ).buttons.resize();
		}


		function clearTable(){
			//$('#hide').css( 'display', 'hide' );
			tbQuery.find('tr').remove();
			divErr.html('');
		}

	});
</script>
@endpush