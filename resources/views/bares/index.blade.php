@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            

                            @can('crear-blog')
                            <a class="btn btn-warning" href="{{ route('bares.create')}}">Nuevo</a>  
                            @endcan

                            <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef ">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff">Titulo</th>
                                    <th style="color:#fff">Contenido</th>
                                    <th style="color:#fff">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($bares as $bar)
                                        <tr>
                                            <td style="display: none;">{{ $bar->id }}</td>
                                            <td>{{ $bar->nombre}}</td>
                                            <td>{{ $bar->contenido}}</td>
                                            <td>
                                                <form action="{{ route('bares.destroy', $bar->id) }}" method='POST'>
                                                    @can('editar-bar')

                                                    <a class="btn btn-info" href="{{ route('bares.destroy', $bar->id)}}">Editar</a>
                                                        
                                                    @endcan

                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-bar')
                                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>

                            <div class="pagination justify-content-end">
                                {{!! $bares->links() !!}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
