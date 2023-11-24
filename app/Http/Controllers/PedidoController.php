<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoProducto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pedido = new Pedido;
        $pedido->user_id = Auth::user()->id;
        $pedido->total = $request->total;
        $pedido->save();

        //OBTENER ID DEL PEDIDO
        $id = $pedido->id;


        //OBTENER PRODUCTOS
       $productos = $request->productos;

        //FORMATEAR ARRAY CON PEDIDOS Y CATNIDADES
        $pedido_producto = [];

        foreach($productos as $producto){
            $pedido_producto[] = [
                'pedido_id'=> $id,
                'producto_id'=> $producto['id'],
                'cantidad'=> $producto['cantidad'],
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ];
        }

        //GUARDAR EN DB

        PedidoProducto::insert($pedido_producto);

        return[
            'message'=> 'pedido realizado correctamente, estara listo en unos minutos'
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}