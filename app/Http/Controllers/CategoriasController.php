<?php

namespace App\Http\Controllers;


use Session;
use Illuminate\Http\Request;
use App\Categoria;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.categorias.index')->with('categorias', Categoria::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categorias.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required'
        ]);

        $categoria = new Categoria;
        $categoria->nome = $request->nome;
        $categoria->save();

        Session::flash('success', 'Categoria criada com sucesso!');

        return redirect()->back();
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
        $categoria = Categoria::find($id);
        return view('admin.categorias.edit')->with('categoria', $categoria);
    }

    public function update(Request $request, $id)
    {
        //
        $categoria = Categoria::find($id);
        $categoria->nome = $request->nome;
        $categoria->save();

        Session::flash('success', 'Categoria editada com sucesso!');

        return redirect('/admin/categorias');
    }

    public function destroy($id)
    {
        //
        $categoria = Categoria::find($id);
        foreach($categoria->posts as $post){
            $post->forceDelete();
        }
        $categoria->delete();

        Session::flash('success', 'Categoria deletada com sucesso!');

        return redirect()->back();
    }
}
