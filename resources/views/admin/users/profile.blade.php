@extends('layouts.app')

@section('content')

  @include('admin.includes.erros')
  <div class="panel panel-default">
      <div class="panel-heading">
          Perfil
      </div>
      <div class="panel-body">
          <form class="" action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group">
                  <label for="nome">Nome:</label>
                  <input type="text" name="nome" class="form-control" value="{{ $user->name }}">
              </div>
              <div class="form-group">
                  <label for="email">Email:</label>
                  <input class="form-control" type="email" name="email" value="{{ $user->email }}">
              </div>
              <div class="form-group">
                  <label for="novaSenha">Nova Senha:</label>
                  <input class="form-control" type="password" name="novaSenha">
              </div>
              <div class="form-group">
                  <label for="avatar">Novo avatar:</label>
                  <input class="form-control" type="file" name="avatar">
              </div>
              <div class="form-group">
                  <label for="facebook">Facebook:</label>
                  <input class="form-control" type="text" name="facebook" value="{{ $user->profile->facebook }}">
              </div>
              <div class="form-group">
                  <label for="youtube">Youtube:</label>
                  <input class="form-control" type="text" name="youtube" value="{{ $user->profile->youtube }}">
              </div>
              <div class="form-group">
                  <label for="sobre">Sobre mim:</label>
                  <textarea name="sobre" class="form-control" id="sobre" cols="6" rows="6">{{ $user->profile->about }}</textarea>
              </div>
              <div class="form-group">
                  <div class="text-center">
                      <button type="submit" name="submit" class="btn btn-success">Salvar Perfil</button>
                  </div>
              </div>
          </form>
      </div>
  </div>

@endsection
