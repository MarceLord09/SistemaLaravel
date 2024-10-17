@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="container">
    <h3> LISTADO DE CONCEPTOS </h3>
    <br>
    <a href="{{route('concepto.pdf')}}" class=" btn btn-success" target="_blank">PDF</a>
    <a href="{{route('concepto.create')}}" class="btn btn-primary"><i class="fas faplus"></i>Registrar Concepto</a>
    <nav class="navbar float-right">
        <form class="form-inline my-2 my-lg-0" method="GET">
            <input name="buscarConcepto" class="form-control mr-sm2" type="search" placeholder="Busqueda por Tipo" arialabel="Search" value="{{$buscarConcepto}}">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar Concepto</button>
        </form>
    </nav>
    

    @if (session('datosConcepto'))
    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
        {{ session('datosConcepto')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if($concepto->isEmpty())
        <p>No hay registro de Concepto</p>
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
                    @foreach($concepto as $itemconcepto)
                    <tr>
                        <td>{{$itemconcepto->idConcepto}}</td>
                        <td>{{$itemconcepto->tipoConcepto}}</td>
                        <td>{{$itemconcepto->descripcion}}</td>

                        <td><a href="{{route ('concepto.edit', $itemconcepto->idConcepto)}}" class="btn btn-info btn-sm">
                                <i class="fas fa-edit"></i> Editar</a>
                            <a href="{{route ('concepto.confirmar', $itemconcepto->idConcepto)}}" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    @endif
    {{ $concepto->links()}}
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



