@extends('layout.master')

@section('title', 'Cadastro de Usuários')
@section('container')
  <div class='table-responsive'>
    <table class='table table-striped table-bordered table-hover table-condensed'>
      <thead>
        <tr>
          <th> Nome </th>
          <th> Email </th>
          <th> Telefone </th>
          <th> Empresa </th>
          <th> Usuário </th>
        </tr>
      </thead>
      <tbody>
        @foreach($lista_usuarios as $user_list)
        <tr>
          <td>{{ $user_list->nome }}</td>
          <td>{{ $user_list->email }}</td>
          <td>{{ $user_list->telefone }}</td>
          <td>{{ $user_list->empresa }}</td>
          <td>{{ $user_list->usuario }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
