@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<style>

</style>
<h1>Lista de Usuarios</h1> 
@stop

@section('content')
<div>
    <div class="card mx-5">
        <div class="card-header m-3">
            <input class="form-control" placeholder="Ingrese el nombre o correo de un usario"> </input>
            <div>
                <table class="table table-hover ">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id}}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td width="10px">
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">Asignar Rol</a>
                            </td>
                        </tr>
                    @endforeach 
                    </tbody>
                  </table>
                             <a href="{{route('users.pdf')}}" class=" btn btn-success" target="_blank">PDF</a>

            </div>
            @stop

            @section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
            @stop

            @section('js')
            <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
            @stop

