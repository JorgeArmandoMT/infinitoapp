<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Tipo;
use App\Proveedor;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;

class ProductoController extends Controller
{

    public function index()
    {
        $productos = Producto::all();
        return view('producto.index', compact('productos'));
    }

    public function create()
    {
        $sugerencias = Producto::all();
        $tipos = Tipo::all();
        $proveedores = Proveedor::all();
        return view('producto.crear', compact(['tipos', 'proveedores', 'sugerencias']));
    }

    public function store(ProductoRequest $request)
    {
        $producto = new Producto($request->input());
        //Condicionamos para saber si existe una foto en la peticion
        if($request->hasFile('foto')){
            //asiganmos la foto a la variable y cambiamos el nombre y movemos el archivo
            $file = $request->file('foto');
            $name = $request->codigo.'_'.now().'.png';
            $file->move(public_path().'/imagenes/productos/',$name);
            $producto->foto = $name;
        }
        /*$producto = request()->except('_token');
        $producto['foto']=$name;
        Producto::create($producto);*/
        $producto->save();
        return redirect('producto/')->with('estatus', 'Se guardo correctamente: '.$producto->nombre.' Con codigo: '.$producto->codigo);
    }

    public function show($id)
    {
        $producto = Producto::find($id);
        return view('producto.mostrar', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        $sugerencias = Producto::all();
        $tipos = Tipo::all();
        $proveedores = Proveedor::all();
        return view('producto/editar', compact(['producto', 'tipos', 'proveedores', 'sugerencias']));
    }

    public function update(ProductoRequest $request, Producto $producto)
    {
        //$producto = request()->except('_method', '_token', 'foto');
        $producto->fill($request->all());
        if($request->hasFile('foto')){
            //asiganmos la foto a la variable y cambiamos el nombre y movemos el archivo
            $file = $request->file('foto');
            $name = $request->codigo.'_'.now().'.png';
            $producto['foto']=$name;
            $file->move(public_path().'/imagenes/productos/',$name);
        }
        $producto->save();
        return redirect('producto/'.$producto->id)->with('estatus', 'Se edito correctamente: '.$producto->nombre.' Con codigo: '.$producto->codigo);
    }

    public function salida(Producto $producto)
    {
        $tipos = Tipo::all();
        $proveedores = Proveedor::all();
        return view('producto/salida', compact(['producto', 'tipos', 'proveedores']));
    }

    public function salidas(Request $request, Producto $producto)
    {
        $producto = Producto::find($request->input('id'));
        $producto->existencia = ($producto->existencia - $request->input('cantidad'));
        $producto->save();
        return redirect('producto/'.$producto->id)->with('estatus', 'Se edito correctamente: '.$producto->nombre.' Con codigo: '.$producto->codigo);
    }

    public function destroy(Producto $producto)
    {
        //
    }
}
