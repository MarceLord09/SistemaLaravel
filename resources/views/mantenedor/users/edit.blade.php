@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Asignar un rol</h1>
@stop

@section('content')
@if(session('info'))
<div class="alert alert-success">
    <strong>{{ session('info') }}</strong>
</div>
@endif
<div class="card">
    <div class="card-body">
        <p class="h5">Nombre:</p>
        <p class="form-control">{{ $user->name }}</p>

        <h2 class="h5">Listado de roles</h2>
        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Seleccionar</th>
                            <th>Rol</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}" 
                                            {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td>{{ $role->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Asignar</button>
        </form>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
