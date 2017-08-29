@extends('layouts.app')

@section('content')

  @include('admin.includes.erros')
  <div class="panel panel-default">
      <div class="panel-heading">
          Criar nova tag
      </div>
      <div class="panel-body">
          <form class="" action="{{ route('tag.store') }}" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                  <label for="tag">Tag:</label>
                  <input type="text" name="tag" class="form-control">
              </div>
              <div class="form-group">
                  <button class="btn btn-success" type="submit"> Gravar Categoria</button>
              </div>
          </form>
      </div>
  </div>

@endsection
