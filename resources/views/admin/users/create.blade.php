@extends('layouts.app')

@section('content')

  @include('admin.includes.erros')
  <div class="panel panel-default">
      <div class="panel-heading">
          Criar novo usuário
      </div>
      <div class="panel-body">
          <form class="" action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group">
                  <label for="usuario">Usuário:</label>
                  <input type="text" name="usuario" class="form-control">
              </div>
              <div class="form-group">
                  <label for="email">Email:</label>
                  <input class="form-control" type="email" name="email">
              </div>
              <div class="form-group">
                  <label for="senha">Senha:</label>
                  <input class="form-control" type="password" name="senha">
              </div>
              <div class="form-group">
                  <div class="text-center">
                      <button type="submit" name="submit" class="btn btn-success">Criar usuário</button>
                  </div>
              </div>
          </form>
      </div>
  </div>

@endsection
