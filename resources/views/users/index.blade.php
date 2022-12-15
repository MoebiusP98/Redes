@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">users</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <a class="btn btn-warning" href="{{ route('users.create') }}">Nuevo</a>
                            
                                <table class="table table-striped mt-2">
                                    <thead style="background-color: #6777ef;">
                                        <th >ID</th>
                                        <th >Nombre</th>
                                        <th >E-mail</th>
                                        <th >Rol</th>
                                        <th >Acciones</th>
                                    </thead>
                                    <tbody>

                                        @foreach ($users as $usuario)

                                        <tr>

                                            <td >{{$usuario->id}}</td>
                                            <td>{{$usuario->name}}</td>
                                            <td>{{$usuario->email}}</td>
                                            <td>
                                                @if (!empty($usuario->getRoleNames()))
                                                    @foreach($usuario->getRoleNames() as $rolName)
                                                    <h5><spam class="badge badge-dark">{{rolName}}</spam></h5>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-info" href="{{ route('users.edit', $usuario->id)}}">Editar</a>

                                                {!! Form::open(['method'=> 'DELETE', 'route'=> ['users.destroy', $usuario->id], 'style'=>'display:inline']) !!}

                                                    {!! Form::submit('Borrar', ['class'=> 'btn btn-danger']) !!}

                                                {!! Form::close() !!}
                                            </td>

                                        </tr>
                                            
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="pagination justify-content-end">
                                    {!! $users->links() !!}
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection