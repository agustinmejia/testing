@extends('voyager::master')

@section('page_title', 'Ver cita médica')

{{-- @section('page_header')
    <h1 class="page-title">
        <i class="voyager-list"></i> Viendo cita médica
        <a href="#" class="btn btn-warning">
            <span class="glyphicon glyphicon-list"></span>&nbsp;
            Volver a la lista
        </a>
    </h1>
@stop --}}

@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-bordered panel-meet" style="height: 550px;">
                    <div id="meet" style="margin: 0px auto"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-bordered" style="height: 550px; overflow-y: auto">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Datos</a></li>
                        <li><a data-toggle="tab" href="#menu1">Historial</a></li>
                        <li><a data-toggle="tab" href="#menu2">Receta</a></li>
                    </ul>
                      
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12" style="margin-bottom: 0px">
                                    <div class="panel-heading" style="border-bottom:0;">
                                        <h3 class="panel-title">Nombre del paciente</h3>
                                    </div>
                                    <div class="panel-body" style="padding-top:0;">
                                        <p>{{ $cita->paciente->nombre_completo }}</p>
                                    </div>
                                    <hr style="margin:0;">                            
                                </div>
                                <div class="col-md-6" style="margin-bottom: 0px">
                                    <div class="panel-heading" style="border-bottom:0;">
                                        <h3 class="panel-title">Género</h3>
                                    </div>
                                    <div class="panel-body" style="padding-top:0;">
                                        <p>{{ $cita->paciente->genero }}</p>
                                    </div>
                                    <hr style="margin:0;">
                                </div>
                                <div class="col-md-6" style="margin-bottom: 0px">
                                    <div class="panel-heading" style="border-bottom:0;">
                                        <h3 class="panel-title">Edad</h3>
                                    </div>
                                    <div class="panel-body" style="padding-top:0;">
                                        @if ($cita->paciente->fecha_nac)
                                            @php
                                                $fecha_nac = \Carbon\Carbon::parse($cita->paciente->fecha_nac);
                                            @endphp
                                            <p>{{ \Carbon\Carbon::now()->diffInYears($fecha_nac) }} Años</p>
                                        @else
                                            No definida
                                        @endif
                                        
                                    </div>
                                    <hr style="margin:0;">
                                </div>
                                <div class="col-md-12">
                                    <div class="panel-heading" style="border-bottom:0;">
                                        <h3 class="panel-title">Motivo de la consulta</h3>
                                    </div>
                                    <div class="panel-body" style="padding-top:0;">
                                        <p>{{ $cita->descripcion }}</p>
                                    </div>
                                    <hr style="margin:0;">
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-success btn-block" id="btn-notification">Enviar notificación <i class="voyager-paper-plane"></i></button>
                                </div>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <div class="col-md-12" style="padding: 0px">
                                <div class="form-group">
                                    <textarea name="" class="form-control" rows="7" placeholder="Diagnóstico médico"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info btn-block">Registrar nuevo diagnóstico</button>
                                </div>
                                <ul class="timeline">
                                    <li>
                                        <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4 class="timeline-title">Fiebre y diarrera</h4>
                                                <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> Hace 11 días</small></p>
                                            </div>
                                            <div class="timeline-body">
                                                <b>Diagnóstico</b>
                                                <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis.</p>
                                                <b>Receta</b>
                                                <ul>
                                                    <li>8 paracetamol <br> <small>Tomar 1 cada 8 horas</small></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <div class="col-md-12" style="padding: 0px">
                                <div class="form-group">
                                    <textarea name="" class="form-control" rows="15" placeholder="Receta médica"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info btn-block">Registrar nueva receta</button>
                                </div>
                            </div>
                        </div>
                      </div>
                    
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
    <style>
        
    </style>
@endsection

@section('javascript')
    <script src='https://conferencias.beni.gob.bo/external_api.js'></script>
    <script>

        const WHATSAPP_API = 'http://127.0.0.1:3000';

        const PHONE = "591{{ $cita->paciente->celular }}";
        const ROOMNAME = "consulta-{{ $cita->id }}"
        const WIDTH = $('.panel-meet').width();
        const HEIGHT = $('.panel-meet').height();

        const domain = 'conferencias.beni.gob.bo';
        const options = {
            roomName: ROOMNAME,
            width: WIDTH,
            height: HEIGHT,
            parentNode: document.querySelector('#meet'),
            lang: 'es',
            devices: {
                audioInput: '<deviceLabel>',
                audioOutput: '<deviceLabel>',
                videoInput: '<deviceLabel>'
            }
        };
        const api = new JitsiMeetExternalAPI(domain, options);
        
        $(document).ready(function () {
            
            // enviar notificación
            $('#btn-notification').click(function(){
                if(PHONE != '591'){
                    $.get(`${WHATSAPP_API}/${PHONE}/${ROOMNAME}`, function(){
                        toastr.success('Notificación enviadad', 'Bien hecho!');
                    });
                }else{
                    toastr.error('El número de celular del paciente no es válido', 'Error');
                }
            });
        });
    </script>
@stop
