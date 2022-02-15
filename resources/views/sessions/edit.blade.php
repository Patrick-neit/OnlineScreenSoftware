@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">New Session</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                           @if ($errors->any())
                           <div class="alert alert-info alert-dismissible fade show" role="alert">
                               <strong>Revise sus datos</strong>
                               @foreach ($errors->all() as $error)
                                   <span class="badge badge-success">{{$error}}</span>
                               @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                           </div>

                           @endif

                           {!! Form::model($session,['method'=>'PUT','route'=> ['sessions.update', $session->id]])!!}
                           <div class="row">
                               <div class="col-xs-12 col-sm-12 col-md-12">
                                   <div class="form-group">
                                        <label for="titulo">Titulo</label>
                                        {!! Form::text('titulo',null,array('class'=> 'form-control')) !!}
                                   </div>

                               </div>
                               <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                     <label for="motivo">Motivo</label>
                                     {!! Form::text('motivo',null,array('class'=> 'form-control')) !!}
                                </div>

                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                     <label for="duracion">Duracion</label>
                                     {!! Form::text('duracion',null,array('class'=> 'form-control')) !!}
                                </div>

                            </div>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>

                           </div>
                             {!! Form::close()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

