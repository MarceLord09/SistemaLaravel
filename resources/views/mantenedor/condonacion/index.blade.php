
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')

<div class="container mt-4">
    <h1 >Lista de Condonaciones</h1>

    <nav class="navbar float-right">
        <form class="form-inline my-2 my-lg-0" method="GET">
            <input name="buscarpor" class="form-control mr-sm2" type="search" placeholder="Busqueda por alumno" arialabel="Search" value="{{$buscarpor}}">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar Condonaciones</button>
        </form>
    </nav>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Condonacion</th>
                <th>ID Deuda</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Concepto</th>
                <th>Monto Pagado</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($condonacion as $itemcondonacion)
            <tr>
                <td>{{ $itemcondonacion->idCondonacion }}</td>
                <td>{{ $itemcondonacion->condonacion->idDeuda}}</td>
                <td>{{ $itemcondonacion->condonacion->deuda->alumno->primerNombre}}</td>
                <td>{{ $itemcondonacion->condonacion->deuda->alumno->apellidoPaterno}}</td>
                <td>{{ $itemcondonacion->condonacion->deuda->conceptoEscala->concepto->tipoConcepto }}</td>
                <td>{{ $itemcondonacion->condonacion->deuda->montoTotal }}</td>
                <td>{{ $itemcondonacion->fecha }}</td>
                <td>
                    <a href="{{ route('condonarDeuda', ['id' => $itemdeuda->idDeuda]) }}" class="btn btn-primary">
                        <i class="fas fa-ban"></i> Condonar
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $condonacion->links()}}
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
