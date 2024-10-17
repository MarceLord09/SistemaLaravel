
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')

<div class="container">
    <h1>Lista de Deudas</h1>

    <nav class="navbar float-right">
        <form class="form-inline my-2 my-lg-0" method="GET">
            <input name="buscarpor" class="form-control mr-sm2" type="search" placeholder="Busqueda por alumno" arialabel="Search" value="{{$buscarpor}}">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar Deudas</button>
        </form>
    </nav>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Deuda</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Concepto de Escala</th>
                <th>Fecha</th>
                <th>Monto Total</th>
                <th>Condonar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deuda as $itemdeuda)
            <tr>
                <td>{{ $itemdeuda->idDeuda }}</td>
                <td>{{ $itemdeuda->asignarEscala->alumno->primerNombre }}</td>
                <td>{{ $itemdeuda->asignarEscala->alumno->apellidoPaterno}}</td>
                <td>{{ $itemdeuda->conceptoEscala->concepto->tipoConcepto }}</td>
                <td>{{ $itemdeuda->fecha }}</td>
                <td>{{ $itemdeuda->montoTotal }}</td>
                <td>
                    <a href="{{ route('condonarDeuda', ['id' => $itemdeuda->idDeuda]) }}" class="btn btn-primary">
                        <i class="fas fa-ban"></i> Condonar
                    </a>

                    <a href="{{ route('pagoDeuda', ['id' => $itemdeuda->idDeuda]) }}" class="btn btn-success">
                        <i class="fas fa-ban"></i> Pagar
                    </a>


                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $deuda->links()}}
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
