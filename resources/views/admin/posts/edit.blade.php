@extends('layouts.app')

@section('content')

  @include('admin.includes.erros')
  <div class="panel panel-default">
      <div class="panel-heading">
          Editar post: {{ $post->titulo }}
      </div>
      <div class="panel-body">
          <form class="" action="{{ route('post.update', ['id' =>  $post->id ]) }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group">
                  <label for="titulo">Título:</label>
                  <input type="text" name="titulo" class="form-control" value="{{ $post->titulo }}">
              </div>
              <div class="form-group">
                  <label for="imagem">Imagem:</label>
                  <input class="form-control" type="file" name="imagem">
              </div>
              <div class="form-group">
                  <label for="categoria">Selecione a categoria:</label>
                  <select class="form-control" id="categoria" name="categoria_id">
                      @foreach ($categorias as $categoria)
                          <option value="{{ $categoria->id }}"

                              @if($post->categoria_id == $categoria->id)

                                  selected

                              @endif
                              
                          >{{ $categoria->nome }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label>Tags</labe>
                  @foreach($tags as $tag)
                    <div class="checkbox">
                        <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                            @foreach($post->tags as $pTag)

                                @if($pTag->id == $tag->id)
                                    checked
                                @endif

                            @endforeach
                        >{{ $tag->tag }}</label>
                    </div>
                  @endforeach
              </div>
              <div class="form-group">
                  <label for="conteudo">Conteúdo:</label>
                  <textarea name="conteudo" id="conteudo" rows="5" cols="5" class="form-control">{{ $post->conteudo }}</textarea>
              </div>
              <div class="form-group">
                  <div class="text-center">
                      <button type="submit" name="submit" class="btn btn-success">Salvar post</button>
                  </div>
              </div>
          </form>
      </div>
  </div>

@endsection
