@extends('layout.master')

@section('title', 'Cadastro de Usuários')
@section('container')
  <div class="formulario-class">
    <form class="" action="index.html" method="post">
      <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" id="nome" placeholder="">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="empresa">Empresa</label>
            <input type="text" name="empresa" class="form-control" id="empresa" placeholder="">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" class="form-control" id="telefone" placeholder="">
          </div>
        </div>
        
      </div>

    </form>
  </div>
@endsection
