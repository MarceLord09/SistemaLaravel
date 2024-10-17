@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="container">
    <h3> LISTADO DE ESCALAS </h3>
    <br>
    <a href="{{route('escala.pdf')}}" class=" btn btn-success" target="_blank">PDF</a>
    <a href="{{route('escalas.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i>Registrar Escala</a>

    <nav class="navbar float-right">
        <form class="form-inline my-2 my-lg-0" method="GET">
            <input name="buscarEscala" class="form-control mr-sm2" type="search" placeholder="Busqueda por Tipo" arialabel="Search" value="{{$buscarEscala}}">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar Escala</button>
        </form>
    </nav>
    

    @if (session('datosEscala'))
    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
        {{ session('datosEscala')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if($escala->isEmpty())
        <p>No hay registro de Escalas</p>
    @else
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">OPCIONES</th>
                </tr>
            </thead>

            <tbody>
                    @foreach($escala as $itemescala)
                    <tr>
                        <td>{{$itemescala->idEscala}}</td>
                        <td>{{$itemescala->tipoEscala}}</td>
                        <td>{{$itemescala->descripcion}}</td>

                        <td><a href="{{route ('escalas.edit', $itemescala->idEscala)}}" class="btn btn-info btn-sm">
                                <i class="fas fa-edit"></i> Editar</a>
                            <a href="{{route ('escalas.confirmar', $itemescala->idEscala)}}" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    @endif
    {{ $escala->links()}}
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



