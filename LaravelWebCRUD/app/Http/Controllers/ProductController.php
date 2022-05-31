<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Carrito;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        /**
         * Asigno el middleware auth al controlador,
         * de modo que sea necesario estar al menos autenticado
         */
        $this->middleware('auth');
    }

    public function index_producto()
    {
        //
        $productos = Producto::all();
        return view("producto.tablaProductos")->with("productos", $productos);
    }

    public function view_producto() 
    {
        //
        $productos = Producto::all();    
        //juntamos las dos tablas para poder sacar los datos de dentro
        $items = Carrito::select("carritos.id as idCarrito","carritos.*", "productos.*")->join('productos', 'productos.id', '=', 'carritos.idProd')->get();

        $totalCompra=0;
        foreach($items as $prod){
             $totalCompra = $prod->precio + $totalCompra;
        }

        

        return view("producto.viewProducto")->with("productos", $productos)->with("totalCompra", $totalCompra)->with("items", $items);
    }   
    
    
    public function crear_producto()
    {
        //
        $productos = Producto::all();
        return view("producto.crearProducto")->with("productos", $productos);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function list_productos(Request $request){ //lo llama desde el web.php -> tablaProductos
        //para mostrar las paginas
        //Elementos para la paginación 
        $pagination = $request->get('pagination');
        $query = $request->get('query');
        $start = 0;
        $skip = $pagination['perpage'];
        if($pagination['page'] != 1){
            $start = ($pagination['page'] - 1) * $pagination['perpage'];
            //Consultamos si hay tantos registros como para empezar en el numero de $start
            $num_prod = Producto::count();
            if($start >= $num_prod){
                $skip = $skip - 1;
                $start = $start - 10;
                if($start < 0){
                    $start = 0;
                }  
            }
        }

        //Barra de busqueda
        $search = '';
        if(isset($query['search_products'])){
            $search = $query['search_products'];
        }

        $array_products = Producto::where('titulo', 'like', '%'.$search.'%')->skip($start)->take($skip)->get();
        //$array_users = User::where('name', 'like', '%'.$search.'%')->get();
        $count_products = Producto::where('titulo', 'like', '%'.$search.'%')->count();
        

        $rowIds[]= array(); //declaramos variable que tiene todos los ids

        foreach($array_products as $producto) {
            $rowIds[] = $producto->id;
        }

        $meta['rowids']= $rowIds;
        $meta['page'] = $pagination['page'];
        $meta['pages'] = 1;
        if(isset($pagination['pages'])){
            $meta['pages'] = $pagination['pages'];
        }
        $meta['perpage'] = $pagination['perpage'];
        $meta['total'] = $count_products;
        $meta['sort'] = 'asc';
        $meta['field'] = 'id';
        $response['meta']= $meta;
        $response['data']= $array_products;
        return response()->json($response);
    }

    
    public function get_producto($id){
        $producto = Producto::find($id);

        $response['code'] = 1000;
        $response['producto'] = $producto;
        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function new_product(Request $request)
    {
        $file = $request->file('img');
        if($file){
            $name = $file->getClientOriginalName();
            $producto = Producto::create([
                'id' => $request->id,
                'titulo' => $request->titulo,
                'precio' => $request->precio,
                'cantidad' => $request->cantidad,
                'descripcion' =>$request->descripcion,
                'img' => $name,
            ]);
            $producto->save();

            $file->move(public_path().'/assets/media/products', $name);
            return redirect('index_producto')->with('warning', 'Producto creado correctamente');

        }else{
            $producto = Producto::create([
                'id' => $request->id,
                'titulo' => $request->titulo,
                'precio' => $request->precio,
                'cantidad' => $request->cantidad,
                'descripcion' =>$request->descripcion,
            ]);
            $producto->save();

            return redirect("index_producto")->with('error', 'Falta añadir una imagen');
        }
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
        $producto= Producto::find($id); //almacena el usuario que queremos ver en concreto para luego editar
        return view("producto.editProducto")->with('user', $producto); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_product(Request $request){
        $producto = Producto::find($request->id);

        $file = $request->file('img');
        if($file){
            $name = $file->getClientOriginalName();
            $producto->id = $request->id;
            $producto->titulo = $request->titulo;
            $producto->precio = $request->precio;
            $producto->cantidad = $request->cantidad;
            $producto->descripcion = $request->descripcion;
            $producto->img = $name;
            $producto->save();  

            $file->move(public_path().'/assets/media/products', $name);
            return redirect('index_producto')->with('warning', 'Producto editado correctamente');
        }else{
            $producto->id = $request->id;
            $producto->titulo = $request->titulo;
            $producto->precio = $request->precio;
            $producto->cantidad = $request->cantidad;
            $producto->descripcion = $request->descripcion;
            $producto->save();

            return redirect("index_producto")->with('error', 'Falta añadir una imagen');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_producto($id){
        $producto = Producto::find($id);
        //no borra en la bd sino q borraria el usuario pero permanece en la bd
        //$product->deleted_at = date("Y-m-d H:i:s");
        //$product->save();
        $producto->delete();
        $response['code'] = 1000;
        return response()->json($response);
    }
}
