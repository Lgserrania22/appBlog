@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
      <div class="panel panel-heading text-center text-primary">
          Usuários
      </div>
        <div class="panel-body">
          <table class="table table-hover">
              <thead>
                  <th>
                      Avatar
                  </th>
                  <th>
                      Nome
                  </th>
                  <th class="text-center">
                      Permissão
                  </th>
                  <th class="text-center">
                      Deletar
                  </th>
              </thead>
              <tbody>
                @if($users->count() > 0)
                  @foreach ($users as $user)
                      <tr>
                          <td>
                              <img src="{{asset($user->profile->avatar)}}" alt="" width="60px" height="60px" style="border-radius: 50%;"/>
                          </td>
                          <td>
                              {{ $user->name }}
                          </td>
                          <td class="text-center">
                            @if($user->admin)
                                <a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-xs btn-danger">Tirar Admin</a>
                            @else
                                <a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-xs btn-success">Dar Admin</a>
                            @endif
                          </td>
                          <td class="text-center">
                            @if($user->id != Auth::user()->id)
                              <a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-xs btn-danger">Deletar</a>
                            @else
                              -
                            @endif
                          </td>
                      </tr>
                  @endforeach
                @else
                  <tr>
                      <th colspan="5" class="text-center"><span class="text-danger">Nenhum usuário cadastrado</span><th>
                  </tr>
                @endif
              </tbody>
          </table>
        </div>
    </div>


@endsection
