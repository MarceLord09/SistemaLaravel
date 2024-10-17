@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Alumnos</h1>
@stop

@section('content')
<div class="container">
    <h3> LISTADO DE ALUMNOS </h3>
    <a href="{{route('alumno.pdf')}}" class=" btn btn-success" target="_blank">PDF</a>

    <a href="{{route('alumno.create')}}" class="btn btn-primary"><i class="fas faplus"></i>Registrar Alumno</a>

    <nav class="navbar float-right">
        <form class="form-inline my-2 my-lg-0" method="GET">
            <input name="buscarpor" class="form-control mr-sm2" type="search" placeholder="Busqueda por ID"
                arialabel="Search" value="{{$buscarpor }}">
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

    @if($alumno->isEmpty())
        <p>No hay registros</p>
    @else
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Primer Nombre</th>
                    <th scope="col">Otros Nombres</th>
                    <th scope="col">Ap. Paterno</th>
                    <th scope="col">Ap. Materno</th>
                    <th scope="col">Año</th>
                    <th scope="col">Seccion</th>
                    <th scope="col">Periodo</th>
                    <th scope="col">OPCIONES</th>
                </tr>
            </thead>

            <tbody>
                @foreach($alumno as $itemalumno)
                    <tr>
                        <td>{{$itemalumno->idAlumno}}</td>
                        <td>{{$itemalumno->primerNombre}}</td>
                        <td>{{$itemalumno->otrosNombres}}</td>
                        <td>{{$itemalumno->apellidoPaterno}}</td>
                        <td>{{$itemalumno->apellidoMaterno}}</td>
                        <td>{{$itemalumno->anio}}</td>
                        <td>{{$itemalumno->seccion}}</td>
                        <td>{{$itemalumno->periodo}}</td>

                        <td><a href="{{route('alumno.edit', $itemalumno->idAlumno)}}" class="btn btn-info btn-sm">
                                <i class="fas fa-edit"></i> Editar</a>
                            <a href="{{route('alumno.confirmar', $itemalumno->idAlumno)}}" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    {{ $alumno->links()}}
</div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
    <script>
    setTimeout(function () {
        document.querySelector('#mensaje').remove();
    }, 2000);
    </script>
@stop