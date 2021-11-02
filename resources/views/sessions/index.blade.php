@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Sessions</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Session View</h3>
                            @can('crear-session')
                            <a class="btn btn-warning" href="{{route('sessions.create')}}">New Session</a>
    
                            @endcan
                            
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef;">
                                    <th >ID</th>
                                    <th style="color: #fff;">Titulo</th>
                                    <th style="color: #fff;">Motivo</th>
                                    <th style="color: #fff;">Duracion</th>
                                    <th style="color: #fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($sessions as $session)
                                        <tr>
                                            <td>{{$session->id}}</td>
                                            <td >{{$session->titulo}}</td>
                                            <td >{{$session->motivo}}</td>
                                            <td >{{$session->duracion}}</td>

                                            <td>
                                                @if (!empty( $session->getRoleNames()))
                                                    @foreach ( $session->getRoleNames() as $rolName)
                                                    <h5><span class="badge badge-dark">{{$rolName}}</span></h5>

                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-info" href="{{route('sessions.edit', $session->id)}}">Editar</a>
                                                {!! Form::open(['method'=> 'DELETE', 'route'=> ['sessions.destroy', $session->id], 'style'=>'display:inline'])!!}
                                                    {!! Form::submit('Borrar', ['class'=> 'btn btn-danger']) !!}
                                                {!! Form::close()!!}

                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!!$sessions->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

