@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">
        <i class="fas fa-edit me-2"></i>Editar Pedido
    </h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pedidos.update', $pedido) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nombre_medicamento" class="form-label">Nombre del medicamento:</label>
                            <input type="text" class="form-control" id="nombre_medicamento" name="nombre_medicamento" value="{{ $pedido->nombre_medicamento }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="tipo_medicamento" class="form-label">Tipo de medicamento:</label>
                            <select class="form-select" id="tipo_medicamento" name="tipo_medicamento" required>
                                <option value="">Seleccione un tipo</option>
                                <option value="analgésico" {{ $pedido->tipo_medicamento == 'analgésico' ? 'selected' : '' }}>Analgésico</option>
                                <option value="analéptico" {{ $pedido->tipo_medicamento == 'analéptico' ? 'selected' : '' }}>Analéptico</option>
                                <option value="anestésico" {{ $pedido->tipo_medicamento == 'anestésico' ? 'selected' : '' }}>Anestésico</option>
                                <option value="antiácido" {{ $pedido->tipo_medicamento == 'antiácido' ? 'selected' : '' }}>Antiácido</option>
                                <option value="antidepresivo" {{ $pedido->tipo_medicamento == 'antidepresivo' ? 'selected' : '' }}>Antidepresivo</option>
                                <option value="antibiótico" {{ $pedido->tipo_medicamento == 'antibiótico' ? 'selected' : '' }}>Antibiótico</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad:</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" min="1" value="{{ $pedido->cantidad }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Distribuidor:</label>
                            <div class="btn-group" role="group">
                                <input type="radio" class="btn-check" name="distribuidor" id="cofarma" value="Cofarma" {{ $pedido->distribuidor == 'Cofarma' ? 'checked' : '' }} required>
                                <label class="btn btn-outline-primary" for="cofarma">Cofarma</label>

                                <input type="radio" class="btn-check" name="distribuidor" id="empsephar" value="Empsephar" {{ $pedido->distribuidor == 'Empsephar' ? 'checked' : '' }} required>
                                <label class="btn btn-outline-primary" for="empsephar">Empsephar</label>

                                <input type="radio" class="btn-check" name="distribuidor" id="cemefar" value="Cemefar" {{ $pedido->distribuidor == 'Cemefar' ? 'checked' : '' }} required>
                                <label class="btn btn-outline-primary" for="cemefar">Cemefar</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sucursal:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="farmacia_principal" id="farmacia_principal" value="1" {{ $pedido->farmacia_principal ? 'checked' : '' }}>
                                <label class="form-check-label" for="farmacia_principal">Farmacia Principal</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="farmacia_secundaria" id="farmacia_secundaria" value="1" {{ $pedido->farmacia_secundaria ? 'checked' : '' }}>
                                <label class="form-check-label" for="farmacia_secundaria">Farmacia Secundaria</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Actualizar
                        </button>
                        <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Cancelar
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection