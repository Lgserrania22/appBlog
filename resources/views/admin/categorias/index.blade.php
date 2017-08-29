@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
      <div class="panel panel-heading text-center">
          Categorias
      </div>
        <div class="panel-body">
          <table class="table table-hover">
              <thead>
                  <th>
                      Nome da Categoria
                  </th>
                  <th>
                      Editar
                  </th>
                  <th>
                      Deletar
                  </th>
              </thead>
              <tbody>
                  @foreach ($categorias as $categoria)
                      <tr>
                          <td>
                              {{ $categoria->nome }}
                          </td>
                          <td>
                              <a class="btn btn-xs btn-info" href="{{ route('categoria.editar', ['id' => $categoria->id]) }}">
                                  Editar
                              </a>
                          </td>
                          <td>
                              <a class="btn btn-xs btn-danger" href="{{ route('categoria.excluir', ['id' => $categoria->id]) }}">
                                  Deletar
                              </a>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
    </div>


@endsection
