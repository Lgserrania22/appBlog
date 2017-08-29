@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
      <div class="panel panel-heading text-center">
          Lixeira
      </div>
        <div class="panel-body">
          <table class="table table-hover">
              <thead>
                  <th>
                      Imagem
                  </th>
                  <th>
                      Título
                  </th>
                  <th>
                      Editar
                  </th>
                  <th>
                      Restaurar
                  </th>
                  <th>
                      Deletar
                  </th>
              </thead>
              <tbody>
                  @if($posts->count() > 0)
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                <img src="{{ $post->featured }}" alt="featured" width="90px" height="50px">
                            </td>
                            <td>
                                {{ $post->titulo }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('post.editar', ['id' => $post->id])}}">
                                    Editar
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-xs btn-success" href="{{ route('post.restore', ['id' => $post->id]) }}">
                                    Restaurar
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-xs btn-danger" href="{{ route('post.kill', ['id' => $post->id]) }}">
                                    Deletar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                  @else
                    <tr>
                        <th colspan="5" class="text-center"><span class="text-danger">Nenhuma postagem está na lixeira</span><th>
                    </tr>
                  @endif
              </tbody>
          </table>
        </div>
    </div>


@endsection
