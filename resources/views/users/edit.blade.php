@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                            @if ($errors->any())

                            <div>
                                <strong>Revise los campos!</strong>
                                @foreach ($errors->all() as $error)
                                    <span class="badge badge-danger">{{$error}}</span>  
                                @endforeach

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            </div>
                                
                            @endif

                            {!! Form::model($user, ['method' => 'PUT', 'route' => ['users.update', $user->id]])!!}
                                <div class="row"> 

                                    <div class="col-xs-12 col-sm-12 col-ms-12">

                                        <div class="form-group">
                                            <label for="name">Nombre</label>
                                            {!! Form::text('name', null, array('class'=>'form-control')) !!}
                                        </div>

                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-ms-12">

                                        <div class="form-group">
                                            <label for="email">E-mail</label>
                                            {!! Form::text('email', null, array('class'=>'form-control')) !!}
                                        </div>

                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-ms-12">

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            {!! Form::password('password', null, array('class'=>'form-control')) !!}
                                        </div>

                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-ms-12">

                                        <div class="form-group">
                                            <label for="confirm-password">Confirmar Password</label>
                                            {!! Form::password ('password', null, array('class'=>'form-control')) !!}
                                        </div>

                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-ms-12">

                                        <div class="form-group">
                                            <label for="">Roles</label>
                                            {!! Form::select('roles[]', $roles, $userRole, array ('class'=>'form-control')) !!}
                                        </div>

                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-12 col-ms-12">

                                        <button type="submit" class="btn btn-primary">Guardar</button>

                                    </div>


                                </div>
                                
                            {!! Form::close() !!}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection