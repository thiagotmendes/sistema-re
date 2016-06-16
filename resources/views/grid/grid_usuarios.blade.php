@extends('layout.master')

@section('title', 'Cadastro de Usuários')
@section('container')
  <div class='table-responsive'>
    <table class='table table-striped table-bordered table-hover table-condensed tabela-usuarios'>
      <thead>
        <tr>
          <th> Nome </th>
          <th> Email </th>
          <th> Telefone </th>
          <th> Empresa </th>
          <th> Usuário </th>
          <th>  </th>
          <th>   </th>
          <th>  </th>
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
          <td class="btn-table">
            <a href="procedimento/{{ $user_list->idusuario }}" class="btn btn-warning" data-toggle="tooltip" data-placement="left" title="Inserir Arquivo">
              <i class="fa fa-file-word-o"></i>
            </a>
          </td>
          <td class="btn-table">
            <a href="editar-usuarios/{{ $user_list->idusuario }}" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Editar Usuário">
              <i class="fa fa-pencil"></i>
            </a>
          </td>
          <td class="btn-table">
            <button type="button" name="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Excluir">
              <i class="fa fa-trash-o"></i>
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
