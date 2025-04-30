@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detalles del Cliente</h4>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Información Básica</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Nombre:</strong> {{ $cliente->nombre }}</li>
                        <li class="list-group-item"><strong>Apellido:</strong> {{ $cliente->apellido }}</li>
                        <li class="list-group-item"><strong>Documento:</strong> {{ $cliente->NumDoc }}</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5>Información de Contacto</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Teléfono:</strong> {{ $cliente->telefono }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $cliente->email }}</li>
                        <li class="list-group-item"><strong>Dirección:</strong> {{ $cliente->direccion }}</li>
                    </ul>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar
                </a>
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>

    <!-- Sección de Vehículos del Cliente -->
    <div class="card shadow-sm mt-4">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0">Vehículos Registrados</h5>
        </div>
        <div class="card-body">
            @if($cliente->vehiculos->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Placa</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Año</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cliente->vehiculos as $vehiculo)
                            <tr>
                                <td>{{ $vehiculo->placa }}</td>
                                <td>{{ $vehiculo->marca }}</td>
                                <td>{{ $vehiculo->modelo }}</td>
                                <td>{{ $vehiculo->anio_fabricacion }}</td>
                                <td>
                                    <a href="{{ route('vehiculos.show', $vehiculo->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-warning">Este cliente no tiene vehículos registrados.</div>
            @endif
        </div>
    </div>
</div>
@endsection