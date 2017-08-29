@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
      <div class="panel panel-heading text-center">
          <span class="text_primary">Tags</span>
      </div>
        <div class="panel-body">
          <table class="table table-hover">
              <thead>
                  <th>
                      Tag
                  </th>
                  <th>
                      Editar
                  </th>
                  <th>
                      Deletar
                  </th>
              </thead>
              <tbody>
                  @foreach ($tags as $tag)
                      <tr>
                          <td>
                              {{ $tag->tag }}
                          </td>
                          <td>
                              <a class="btn btn-xs btn-info" href="{{ route('tag.edit', ['id' => $tag->id]) }}">
                                  Editar
                              </a>
                          </td>
                          <td>
                              <a class="btn btn-xs btn-danger" href="{{ route('tag.delete', ['id' => $tag->id]) }}">
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
