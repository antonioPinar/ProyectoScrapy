<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use App\Models\Foto;
use App\Http\Requests\RegisterRequest;
use App\Models\Role;

class webController extends Controller
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

    public function index()
    {
        //
        $role = Role::all();
        $user = User::all();
        $productos = Producto::all();
        $carrito = Carrito::all();
        return view("home")->with('user', $user)->with('role', $role)->with("productos", $productos)->with("carrito", $carrito); //para enviar datos al blade
        
    }

    public function ver_usuarios(){
        return view('usuario.tablaUsuarios');
    }

    public function logout(Request $request) {
        $r= $request->session()->flush(); //termina la sesion actual y redirige al login
        return redirect('/');
    }

    public function crear_user()
    {
        //
        $role = Role::all();
        $productos = Producto::all();
        $user = User::all();
        return view("usuario.crearUsuario")->with('user', $user)->with('role', $role)->with("productos", $productos);
    }

    //vista admin
    public function list_usuarios(Request $request){ //lo llama desde el web.php -> home.blade
        //para mostrar las paginas
        //Elementos para la paginación 
        $pagination = $request->get('pagination');
        $query = $request->get('query');
        $start = 0;
        $skip = $pagination['perpage'];
        if($pagination['page'] != 1){
            $start = ($pagination['page'] - 1) * $pagination['perpage'];
            //Consultamos si hay tantos registros como para empezar en el numero de $start
            $num_user = User::count();
            if($start >= $num_user){
                $skip = $skip - 1;
                $start = $start - 10;
                if($start < 0){
                    $start = 0;
                }  
            }
        }

        //Barra de busqueda
        $search = '';
        if(isset($query['search_users'])){
            $search = $query['search_users'];
        }

        $array_users = User::where('name', 'like', '%'.$search.'%')->skip($start)->take($skip)->get();
        //$array_users = User::where('name', 'like', '%'.$search.'%')->get();
        $count_users = User::where('name', 'like', '%'.$search.'%')->count();
        

        $rowIds[]= array(); //declaramos variable que tiene todos los ids

        foreach($array_users as $user) {
            $rowIds[] = $user->id;
        }

        $meta['rowids']= $rowIds;

        $meta['page'] = $pagination['page'];
        $meta['pages'] = 1;
        if(isset($pagination['pages'])){
            $meta['pages'] = $pagination['pages'];
        }
        $meta['perpage'] = $pagination['perpage'];
        $meta['total'] = $count_users;
        $meta['sort'] = 'asc';
        $meta['field'] = 'id';
        $response['meta']= $meta;
        $response['data']= $array_users;
        return response()->json($response);
    }

    //vista usuario normal
    public function list_usuarios_normales(Request $request){ //lo llama desde el web.php -> home.blade
        //para mostrar las paginas
        //Elementos para la paginación 
        $pagination = $request->get('pagination');
        $query = $request->get('query');
        $start = 0;
        $skip = $pagination['perpage'];
        if($pagination['page'] != 1){
            $start = ($pagination['page'] - 1) * $pagination['perpage'];
            //Consultamos si hay tantos registros como para empezar en el numero de $start
            $num_user = User::count();
            if($start >= $num_user){
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

        $array_users = User::where('name', 'like', '%'.$search.'%')->skip($start)->take($skip)->get();
        //$array_users = User::where('name', 'like', '%'.$search.'%')->get();
        $count_users = User::where('name', 'like', '%'.$search.'%')->count();
        

        $rowIds[]= array(); //declaramos variable que tiene todos los ids

        foreach($array_users as $user) {
            $rowIds[] = $user->id;
        }

        $meta['rowids']= $rowIds;

        $meta['page'] = $pagination['page'];
        $meta['pages'] = 1;
        if(isset($pagination['pages'])){
            $meta['pages'] = $pagination['pages'];
        }
        $meta['perpage'] = $pagination['perpage'];
        $meta['total'] = $count_users;
        $meta['sort'] = 'asc';
        $meta['field'] = 'id';
        $response['meta']= $meta;
        $response['data']= $array_users;
        return response()->json($response);
    }

    public function get_user($id){
        $user = User::find($id);

        $response['code'] = 1000;
        $response['user'] = $user;
        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    /*
    public function create()
    {
        //
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request) //lo usa el crear usuario
    {
        $file = $request->file('foto_id');
        if($file){
            $name = $file->getClientOriginalName();
            $user = User::create([
                'id' => $request->id,
                'name' => $request->name,
                'email' => $request->email,
                'password' =>bcrypt($request->password),
                'foto_id' => $name,
                'role_id' => $request->role_id
            ]);
            $user->save();  
            
            $file->move(public_path().'/images', $name);
            return redirect('home')->with('success', 'Usuario creado correctamente'); //redirecciona a esa pagina
        }else {
            $user = User::create([
                'id' => $request->id,
                'name' => $request->name,
                'email' => $request->email,
                'password' =>bcrypt($request->password),
                'role_id' => $request->role_id
            ]);
            $user->save();
            return redirect("home")->with('error', 'Falta añadir una imagen');
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
        $user= User::find($id); //almacena el usuario que queremos ver en concreto para luego editar
        return view("usuario.editUsuario")->with('user', $user); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);//Mediante este metodo findorfail hacemos una busqueda del id del usuario que nos llega por parametros de la tabla para ver si dicho usuario existe
        return view('usuario.editUsuario')->with('user', $user);// ridirigimos toda la informacion del usuario a la vista para su posterior edicion
        
    }
*/

    public function edit_usuario(Request $request){
        $user = User::find($request->id);

        $file = $request->file('foto_id');
        if($file){
            $name = $file->getClientOriginalName();
            $user->id = $request->id;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role_id = $request->role_id;
            $user->foto_id = $name;
            $user->save();  

            $file->move(public_path().'/images', $name);
            return redirect('home')->with('warning', 'Usuario editado correctamente');
        }else{
            $user->id = $request->id;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role_id = $request->role_id;
            $user->save(); 

            return redirect("home")->with('error', 'Falta añadir una imagen');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*

    public function update(Request $request, $id)
    {
        //
        $user= User::find($id); //almacenamos usuario
        $entrada= $request->all();
        if($archivo=$request->file('foto_id')){ //si hay imagen
            $nombre= $archivo->getClientOriginalName(); 
            $archivo->move('images', $nombre);
            $foto= Foto::create(['ruta_foto'=> $nombre]);
            $entrada['foto_id'] = $foto->id;
        }
        $user->update($entrada); //actualiza la informacion en la bd

        return redirect('home')->with('success', 'Usuario Editado correctamente');
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     /*
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return redirect('home')->with('info', 'Usuario Eliminado correctamente');
    }*/

    public function delete_user($id){
        $user = User::find($id);
        //no borra en la bd sino q borraria el usuario pero permanece en la bd
        //$product->deleted_at = date("Y-m-d H:i:s");
        //$product->save();
        $user->delete();
        $response['code'] = 1000;
        return response()->json($response);
    }
}
