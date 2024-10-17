@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="container">
    <h3> ASIGNACION DE ESCALAS </h3>
    <br>
    <a href="{{route('asignar.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i>Realizar Asignacion</a>

    <nav class="navbar float-right">
        <form class="form-inline my-2 my-lg-0" method="GET">
            <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Busqueda" arialabel="Search" value="{{$buscarpor}}">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar Alumno</button>
        </form>
    </nav>
    

    @if (session('datos'))
    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
        {{ session('datos')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if($asignar->isEmpty())
        <p>No hay registros</p>
    @else
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">ID Alumno</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Año</th>
                    <th scope="col">Escala</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>

            <tbody>
                    @foreach($asignar as $itemasignar)
                    <tr>
                        <td>{{$itemasignar->idAsignarEscala}}</td>
                        <td>{{$itemasignar->idAlumno}}</td>
                        <td>{{$itemasignar->alumno->primerNombre}}</td>
                        <td>{{$itemasignar->alumno->apellidoPaterno}}</td>
                        <td>{{$itemasignar->alumno->anio}}</td>
                        <td>{{$itemasignar->escala->tipoEscala}}</td>
                        <td>{{$itemasignar->fecha}}</td>
                        <td><a href="{{route ('asignar.edit', $itemasignar->idAsignarEscala)}}" class="btn btn-info btn-sm">
                                <i class="fas fa-edit"></i> Editar</a>
                            <a href="{{route ('asignar.confirmar', $itemasignar->idAsignarEscala)}}" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    @endif
    {{ $asignar->links()}}
</div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
    <script>
    setTimeout(function(){
    document.querySelector('#mensaje').remove();
    },2000);
 </script>
@stop



