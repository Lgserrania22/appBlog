@extends('layouts.app')

@section('content')

  @include('admin.includes.erros')
  <div class="panel panel-default">
      <div class="panel-heading">
          Editar configurações do blog
      </div>
      <div class="panel-body">
          <form class="" action="{{ route('setting.update') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group">
                  <label for="site_name">Nome do site:</label>
                  <input type="text" name="site_name" value="{{ $settings->site_name }}" class="form-control">
              </div>
              <div class="form-group">
                  <label for="address">Endereço:</label>
                  <input class="form-control" type="text" name="address" value="{{ $settings->address }}">
              </div>
              <div class="form-group">
                  <label for="contact_number">Telefone de Contato:</label>
                  <input class="form-control" type="text" name="contact_number" value="{{ $settings->contact_number }}">
              </div>
              <div class="form-group">
                  <label for="contact_email">Email de Contato:</label>
                  <input class="form-control" type="text" name="contact_email" value="{{ $settings->contact_email }}">
              </div>
              <div class="form-group">
                  <div class="text-center">
                      <button type="submit" name="submit" class="btn btn-success">Salvar Configurações</button>
                  </div>
              </div>
          </form>
      </div>
  </div>

@endsection
