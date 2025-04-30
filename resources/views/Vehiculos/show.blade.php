@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detalles del Vehículo</h4>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Información del Vehículo</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Placa:</strong> {{ $vehiculo->placa }}</li>
                        <li class="list-group-item"><strong>Marca:</strong> {{ $vehiculo->marca }}</li>
                        <li class="list-group-item"><strong>Modelo:</strong> {{ $vehiculo->modelo }}</li>
                        <li class="list-group-item"><strong>Año:</strong> {{ $vehiculo->anio_fabricacion }}</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5>Información del Propietario</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Cliente:</strong> {{ $vehiculo->cliente->nombre }} {{ $vehiculo->cliente->apellido }}</li>
                        <li class="list-group-item"><strong>Documento:</strong> {{ $vehiculo->cliente->NumDoc }}</li>
                        <li class="list-group-item"><strong>Teléfono:</strong> {{ $vehiculo->cliente->telefono }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $vehiculo->cliente->email }}</li>
                    </ul>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('vehiculos.edit', $vehiculo->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar
                </a>
                <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>
</div>
@endsection