<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        $items = Carrito::select("carritos.id as idCarrito","carritos.*", "productos.*")->join('productos', 'productos.id', '=', 'carritos.idProd')->get();
        $totalCompra=0;
        foreach($items as $prod){
             $totalCompra = $prod->precio + $totalCompra;
        }
        return view("producto.comprarProducto")->with("items", $items)->with("totalCompra", $totalCompra);
    }

    public function buy_product(Request $request, $id)
    {
        $productos = Producto::find($id);
        //$userId = auth()->user()->id; // or any string represents user identifier

        return view("producto.comprarProducto")->with("productos", $productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_product(Request $request) //agrega al carrito
    {
        
            $carrito = Carrito::create([
                'id' => $request->id,
                'idProd' => $request->idp,
                'idUser' => auth()->user()->id,
                'cantidad_prod' => $request->cantidad_prod + 1,
                'total' =>$request->precio,
            ]);

            $carrito->save();
            return redirect("view_producto")->with('success', 'Item Agregado a su Carrito!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_carrito($id)
    {
        //
        $item = Carrito::find($id);
        $item->delete();
        return redirect("view_producto");
    }
}
