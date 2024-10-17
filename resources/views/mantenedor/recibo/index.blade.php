@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="container">
    <h3> LISTADO DE RECIBOS </h3>
    <br>
    <a href="{{route('recibo.pdf')}}" class=" btn btn-success" target="_blank">PDF</a>
    <a href="{{route('recibo.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i>Registrar Recibo</a>

    <nav class="navbar float-right">
        <form class="form-inline my-2 my-lg-0" method="GET">
            <input name="buscarRecibo" class="form-control mr-sm2" type="search" placeholder="Busqueda por #" arialabel="Search" value="{{$buscarRecibo}}">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar Recibo</button>
        </form>
    </nav>
    

    @if (session('datosRecibo'))
    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
        {{ session('datosRecibo')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if($recibo->isEmpty())
        <p>No hay registro de Recibos</p>
    @else
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">N° Recibo</th>
                    <th scope="col">Concepto</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>

            <tbody>
                    @foreach($recibo as $itemrecibo)
                    <tr>
                        <td>{{$itemrecibo->idRecibo}}</td>
                        <td>{{$itemrecibo->concepto}}</td>
                        <td>{{$itemrecibo->fecha}}</td>
                        <td>{{$itemrecibo->monto}}</td>
                        <td><a href="{{route ('recibo.edit', $itemrecibo->idRecibo)}}" class="btn btn-info btn-sm">
                                <i class="fas fa-edit"></i> Editar</a>
                            <a href="{{route ('recibo.confirmar', $itemrecibo->idRecibo)}}" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    @endif
    {{ $recibo->links()}}
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

