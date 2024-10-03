@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">
        <i class="fas fa-clipboard-list me-2"></i>Realizar Pedido
    </h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('pedidos.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre_medicamento" class="form-label">Nombre del medicamento:</label>
                            <input type="text" class="form-control" id="nombre_medicamento" name="nombre_medicamento" required>
                        </div>
                        <div class="mb-3">
                            <label for="tipo_medicamento" class="form-label">Tipo de medicamento:</label>
                            <select class="form-select" id="tipo_medicamento" name="tipo_medicamento" required>
                                <option value="">Seleccione un tipo</option>
                                <option value="analgésico">Analgésico</option>
                                <option value="analéptico">Analéptico</option>
                                <option value="anestésico">Anestésico</option>
                                <option value="antiácido">Antiácido</option>
                                <option value="antidepresivo">Antidepresivo</option>
                                <option value="antibiótico">Antibiótico</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad:</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Distribuidor:</label>
                            <div class="btn-group" role="group">
                                <input type="radio" class="btn-check" name="distribuidor" id="cofarma" value="Cofarma" required>
                                <label class="btn btn-outline-primary" for="cofarma">Cofarma</label>

                                <input type="radio" class="btn-check" name="distribuidor" id="empsephar" value="Empsephar" required>
                                <label class="btn btn-outline-primary" for="empsephar">Empsephar</label>

                                <input type="radio" class="btn-check" name="distribuidor" id="cemefar" value="Cemefar" required>
                                <label class="btn btn-outline-primary" for="cemefar">Cemefar</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sucursal:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="farmacia_principal" id="farmacia_principal" value="1">
                                <label class="form-check-label" for="farmacia_principal">Farmacia Principal</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="farmacia_secundaria" id="farmacia_secundaria" value="1">
                                <label class="form-check-label" for="farmacia_secundaria">Farmacia Secundaria</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-check me-2"></i>Confirmar
                        </button>
                        <button type="reset" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>Cancelar
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">

        {{--@if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }} 
            </div>
        @endif--}}
            <h2 class="mb-3">
                <i class="fas fa-list me-2"></i>Lista de Pedidos
            </h2>
            @foreach($pedidos as $pedido)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Pedido al distribuidor {{ $pedido->distribuidor }}</h5>
                        <p class="card-text">
                            <strong>{{ $pedido->cantidad }}</strong> unidades del {{ $pedido->tipo_medicamento }} <strong>{{ $pedido->nombre_medicamento }}</strong>
                        </p>
                        <p class="card-text">
                            Para la farmacia situada en 
                            @if($pedido->farmacia_principal)
                                <span class="badge bg-info">Calle de la Rosa n. 28</span>
                            @endif
                            @if($pedido->farmacia_principal && $pedido->farmacia_secundaria)
                                y 
                            @endif
                            @if($pedido->farmacia_secundaria)
                                <span class="badge bg-info">Calle Alcazabilla n. 3</span>
                            @endif
                        </p>
                        <a href="{{ route('pedidos.edit', $pedido) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit me-1"></i>Actualizar
                        </a>
                        <form action="{{ route('pedidos.destroy', $pedido) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt me-1"></i>Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection