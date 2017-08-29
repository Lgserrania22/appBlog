@extends('layouts.app')

@section('styles')

  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.css" rel="stylesheet">

@endsection

@section('content')

  @include('admin.includes.erros')
  <div class="panel panel-default">
      <div class="panel-heading">
          Criar novo post
      </div>
      <div class="panel-body">
          <form class="" action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group">
                  <label for="titulo">Título:</label>
                  <input type="text" name="titulo" class="form-control">
              </div>
              <div class="form-group">
                  <label for="imagem">Imagem:</label>
                  <input class="form-control" type="file" name="imagem">
              </div>
              <div class="form-group">
                  <label for="categoria">Selecione a categoria:</label>
                  <select class="form-control" id="categoria" name="categoria_id">
                      @foreach ($categorias as $categoria)
                          <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label>Tags</labe>
                  @foreach($tags as $tag)
                    <div class="checkbox">
                        <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->tag }}</label>
                    </div>
                  @endforeach
              </div>
              <div class="form-group">
                  <label for="conteudo">Conteúdo:</label>
                  <textarea name="conteudo" id="conteudo" rows="10" cols="5" class="form-control"></textarea>
              </div>
              <div class="form-group">
                  <div class="text-center">
                      <button type="submit" name="submit" class="btn btn-success">Criar post</button>
                  </div>
              </div>
          </form>
      </div>
  </div>

@endsection

@section('scripts')

  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.js"></script>
  <script>
    $(document).ready(function() {
        $('#conteudo').summernote();
    });
  </script>

@endsection
