
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')

<div class="container mt-4">
    <h1 >Lista de Pagos</h1>

    <nav class="navbar float-right">
        <form class="form-inline my-2 my-lg-0" method="GET">
            <input name="buscarpor" class="form-control mr-sm2" type="search" placeholder="Busqueda por alumno" arialabel="Search" value="{{$buscarpor}}">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar Pagos</button>
        </form>
    </nav>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Pago</th>
                <th>ID Deuda</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Concepto</th>
                <th>Monto Pagado</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pago as $itempago)
            <tr>
                <td>{{ $itempago->idPago }}</td>
                <td>{{ $itempago->pago->idDeuda}}</td>
                <td>{{ $itempago->pago->deuda->alumno->primerNombre}}</td>
                <td>{{ $itempago->pago->deuda->alumno->apellidoPaterno}}</td>
                <td>{{ $itempago->pago->deuda->conceptoEscala->concepto->tipoConcepto }}</td>
                <td>{{ $itempago->pago->deuda->montoTotal }}</td>
                <td>{{ $itempago->fecha }}</td>
                <td>
                    <a href="{{route ('pago.confirmar', $itempago->idPago)}}" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i> Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pago->links()}}
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
               