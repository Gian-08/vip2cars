@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    <h5 class="mb-0">Editar Vehículo: {{ $vehiculo->placa }}</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('vehiculos.update', $vehiculo->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="placa" class="form-label">Placa</label>
                            <input type="text" class="form-control" id="placa" name="placa" 
                                   value="{{ old('placa', $vehiculo->placa) }}" required>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="marca" class="form-label">Marca</label>
                                <input type="text" class="form-control" id="marca" name="marca" 
                                       value="{{ old('marca', $vehiculo->marca) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="modelo" class="form-label">Modelo</label>
                                <input type="text" class="form-control" id="modelo" name="modelo" 
                                       value="{{ old('modelo', $vehiculo->modelo) }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="anio_fabricacion" class="form-label">Año de Fabricación</label>
                            <input type="number" class="form-control" id="anio_fabricacion" name="anio_fabricacion" 
                                   min="1900" max="{{ date('Y') + 1 }}" 
                                   value="{{ old('anio_fabricacion', $vehiculo->anio_fabricacion) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="cliente_id" class="form-label">Propietario</label>
                            <select class="form-select" id="cliente_id" name="cliente_id" required>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}" 
                                        {{ $vehiculo->cliente_id == $cliente->id ? 'selected' : '' }}>
                                        {{ $cliente->nombre }} {{ $cliente->apellido }} ({{ $cliente->NumDoc }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary me-md-2">
                                <i class="fas fa-save"></i> Actualizar
                            </button>
                            <a href="{{ route('vehiculos.show', $vehiculo->id) }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection