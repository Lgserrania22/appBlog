@extends('layouts.app')

@section('content')

  @include('admin.includes.erros')
  <div class="panel panel-default">
      <div class="panel-heading">
          Editar Tag
      </div>
      <div class="panel-body">
          <form class="" action="{{ route('tag.update', ['id' => $tag->id]) }}" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                  <label for="tag">Tag:</label>
                  <input type="text" name="tag" value="{{ $tag->tag }}" class="form-control">
              </div>
              <div class="form-group">
                  <button class="btn btn-success" type="submit">Salvar</button>
              </div>
          </form>
      </div>
  </div>

@endsection
