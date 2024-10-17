@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="container">

    <h3> LISTADO DE CONCEPTOS POR ESCALA </h3>
    <br>
    <a href="{{route('conceptoEscala.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i>Realizar
        asignación</a>

    <nav class="navbar  float-right">
        <form class="form-inline my-2 my-lg-0" method="GET">
            <input name="buscarConcepto" class="form-control mr-sm2" type="search" placeholder="Busqueda por ID"
                arialabel="Search" value="{{$buscarConcepto}}">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar </button>
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

    @if($conceptoEscala->isEmpty())
        <p>No hay registro de Concepto</p>
    @else
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Escala</th>
                    <th scope="col">Concepto</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($conceptoEscala as $itemconceptoEscala)
                    <tr>
                        <td>{{$itemconceptoEscala->idEscalaConcepto}}</td>
                        <td>{{$itemconceptoEscala->escala->tipoEscala}}</td>
                        <td>{{$itemconceptoEscala->concepto->tipoConcepto}}</td>
                        <td>{{$itemconceptoEscala->monto}}</td>
                        <td><a href="{{route('conceptoEscala.edit', $itemconceptoEscala->idEscalaConcepto)}}"
                                class="btn btn-info btn-sm">
                                <i class="fas fa-edit"></i> Editar</a>
                            <a href="{{route('conceptoEscala.confirmar', $itemconceptoEscala->idEscalaConcepto)}}"
                                class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    {{ $conceptoEscala->links()}}
</div>

@stop

@section('css')
{{-- Add here extra stylesheets --}}
{{--
<link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
<script>
    setTimeout(function () {
        document.querySelector('#mensaje').remove();
    }, 2000);
</script>
@stop