@extends('layouts.app')

@section('content')

  @include('admin.includes.erros')
  <div class="panel panel-default">
      <div class="panel-heading">
          Editar Categoria
      </div>
      <div class="panel-body">
          <form class="" action="{{ route('categorias.update', ['id' => $categoria->id]) }}" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                  <label for="nome">Nome:</label>
                  <input type="text" name="nome" value="{{ $categoria->nome }}" class="form-control">
              </div>
              <div class="form-group">
                  <button class="btn btn-success" type="submit">Salvar</button>
              </div>
          </form>
      </div>
  </div>

@endsection
