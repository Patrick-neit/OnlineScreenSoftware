@extends('layouts.app')

@section('content')
<link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Usuarios View</h3>

                            <a class="btn btn-warning" href="{{route('usuarios.create')}}">New User</a>

                            <table id= "example" class="table table-striped mt-2">
                                <thead style="background-color: #6777ef;">
                                    <th style="display:none;">ID</th>
                                    <th style="color: #fff;">Nombre</th>
                                    <th style="color: #fff;">E-mail</th>
                                    <th style="color: #fff;">Rol</th>
                                    <th style="color: #fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td style="display: none;">{{$user->id}}</td>
                                            <td >{{$user->name}}</td>
                                            <td >{{$user->email}}</td>
                                            <td>
                                                @if (!empty( $user->getRoleNames()))
                                                    @foreach ( $user->getRoleNames() as $rolName)
                                                    <h5><span class="badge badge-dark">{{$rolName}}</span></h5>

                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-info" href="{{route('usuarios.edit', $user->id)}}">Editar</a>
                                                {!! Form::open(['method'=> 'DELETE', 'route'=> ['usuarios.destroy', $user->id], 'style'=>'display:inline'])!!}
                                                    {!! Form::submit('Borrar', ['class'=> 'btn btn-danger']) !!}
                                                {!! Form::close()!!}

                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!!$users->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css"> </script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"> </script>



        <script>

        $(document).ready(function() {
            $('#example').DataTable();
        } );

    </script>
    </section>
@endsection

