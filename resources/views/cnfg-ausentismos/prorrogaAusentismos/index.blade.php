@extends('layouts.menu')
@section('title', '/ Prorrogas')
@include('widgets.datatable.datatable-export')


@section('page_heading')
    <div class="row">
        <div id="titulo" class="col-xs-8 col-md-6 col-lg-6">
            Prorroga Ausentismos
        </div>
        <div id="btns-top" class="col-xs-4 col-md-6 col-lg-6 text-right">
            <a class='btn btn-primary' role='button' href="{{ route('cnfg-ausentismos.prorrogaausentismos.create') }}" data-tooltip="tooltip" title="Crear Nuevo">
                <i class="fa fa-plus" aria-hidden="true"></i>
            </a>
        </div>
    </div>
@endsection

@section('section')

   <div class="row">
        @include('cnfg-ausentismos.prorrogaausentismos.table')
    </div>

    @include('widgets/modal-delete')
@endsection
