<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedidos.index', compact('pedidos'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre_medicamento' => 'required|alpha_num',
            'tipo_medicamento' => 'required',
            'cantidad' => 'required|integer|min:1',
            'distribuidor' => 'required',
            'farmacia_principal' => 'sometimes|boolean',
            'farmacia_secundaria' => 'sometimes|boolean',
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'alpha_num' => 'El campo :attribute solo puede contener letras y números.',
            'integer' => 'El campo :attribute debe ser un número entero.',
            'min' => 'El campo :attribute debe ser al menos :min.',
        ]);

        // VAlidar de que los campos booleanos estén presentes y sean booleanos
        $validatedData['farmacia_principal'] = $request->has('farmacia_principal');
        $validatedData['farmacia_secundaria'] = $request->has('farmacia_secundaria');

         // Verificar si se seleccionó al menos una farmacia
        if (!$validatedData['farmacia_principal'] && !$validatedData['farmacia_secundaria']) {
            return redirect()->back()->withInput()->withErrors(['farmacia' => 'Debe seleccionar al menos una farmacia.']);
        }

        Pedido::create($validatedData);

        return redirect()->route('pedidos.index')->with('success', 'Pedido realizado con éxito');
    }

    public function edit(Pedido $pedido)
    {
        return view('pedidos.edit', compact('pedido'));
    }

    public function update(Request $request, Pedido $pedido)
    {
        $validatedData = $request->validate([
            'nombre_medicamento' => 'required|alpha_num',
            'tipo_medicamento' => 'required',
            'cantidad' => 'required|integer|min:1',
            'distribuidor' => 'required',
            'farmacia_principal' => 'sometimes|boolean',
            'farmacia_secundaria' => 'sometimes|boolean',
        ]);

        // Asegúrate de que los campos booleanos estén presentes y sean booleanos
        $validatedData['farmacia_principal'] = $request->has('farmacia_principal');
        $validatedData['farmacia_secundaria'] = $request->has('farmacia_secundaria');

        $pedido->update($validatedData);

        return redirect()->route('pedidos.index')->with('success', 'Pedido actualizado con éxito');
    }

    public function destroy(Pedido $pedido)
    {
        $pedido->delete();

        return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado con éxito');
    }
}
