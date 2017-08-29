<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Post;
use Session;
use App\Tag;

class PostsController extends Controller
{

    public function index()
    {
        //
        return view('admin.posts.index')->with('posts', Post::all());
    }

    public function trashed()
    {
        //
        return view('admin.posts.trashed')->with('posts', Post::onlyTrashed()->get());
    }

    public function create()
    {
        //Retorna a view de criação de um Post
        $categorias = Categoria::all();
        $tags = Tag::all();

        if(count($categorias) == 0 || count($tags) == 0){
            Session::flash('error', 'Você precisa ter pelo menos uma categoria e uma tag antes de criar um post');
            return redirect()->back();
        }

        return view('admin.posts.create')->with('categorias', $categorias)->with('tags', Tag::all());
    }

    public function store(Request $request)
    {
        //Salvar um post no banco
        $this->validate($request, [
            'titulo' => 'required',
            'imagem' => 'required|image',
            'conteudo' => 'required',
            'categoria_id' => 'required',
            'tags' => 'required'
        ]);

        $featured = $request->imagem;
        $nomeFeatured = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $nomeFeatured);

        $post = Post::create([
            'titulo' => $request->titulo,
            'conteudo' => $request->conteudo,
            'featured' => 'uploads/posts/'.$nomeFeatured,
            'categoria_id' => $request->categoria_id,
            'slug' => str_slug($request->titulo)
        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success', 'Post criado com sucesso!');

        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $post = Post::find($id);
        return view('admin.posts.edit')->with('post', $post)->with('categorias', Categoria::all())->with('tags', Tag::all());
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'conteudo' => 'required',
            'categoria_id' => 'required'
        ]);

        $post = Post::find($id);

        if($request->hasFile('imagem')){
            $featured = $request->imagem;
            $nomeFeatured = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts', $nomeFeatured);
            $post->featured = 'uploads/posts/'.$nomeFeatured;
        }

        $post->titulo = $request->titulo;
        $post->conteudo = $request->conteudo;
        $post->categoria_id = $request->categoria_id;

        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('success','Postagem editada com sucesso!');

        return redirect()->route('posts');
    }

    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->delete();

        Session::flash('success', 'A postagem foi movida para a lixeira!');

        return redirect()->back();
    }

    public function kill($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();

        Session::flash('success', 'Postagem deletada permanentemente!');
        return redirect()->back();
    }

    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();

        $post->save();

        Session::flash('success', 'Postagem restaurada com sucesso!');
        return redirect()->back();
    }
}
