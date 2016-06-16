@extends('layout.master')

@section('title', 'principal')
@section('container')
  @if(empty($acompanhamentoUser))
    <div class="alert alert-danger">
      Nenhuma interação inserida para este usuário
    </div>
  @else
    @foreach($acompanhamentoUser as $interacoes)
      <div class="interacoes-grid">
        <div class="title-interact">
          {{ $interacoes->assunto }}
          <div class="pull-right">
            <span class="label label-primary">{{ date('d/m/Y', strtotime($interacoes->idanexoUsuario)) }}</span>
          </div>
        </div>
        <div class="obs">
          {{ $interacoes->observacao }}
        </div>
        <div class="caminho-arquivo">
          <a href="<?= url($interacoes->patchArquivo) ?>" class="btn btn-info" target="_blank">
            Arquivo em anexo <i class="fa fa-file" aria-hidden="true"></i>
          </a>
          <?php
          $arquivo = $interacoes->patchArquivo;
          $var_teste = explode( '/', $arquivo);
          //var_dump($var_teste);
          echo $var_teste[2];
          ?>
        </div>
      </div>
    @endforeach
  @endif
@endsection
