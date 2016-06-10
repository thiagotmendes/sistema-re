@extends('layout.master')

@section('title', 'principal')
@section('container')
  <h1>Olá!</h1>
  Área do usuário
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
            {{ date('F d, Y', strtotime($interacoes->created_at)) }}
          </div>
        </div>
        <div class="obs">
          {{ $interacoes->observacao }}
        </div>
        <div class="caminho-arquivo">
          <a href="<?= url($interacoes->patchArquivo) ?>" class="btn btn-info" target="_blank">
            Arquivo em anexo <i class="fa fa-file" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    @endforeach
  @endif
@endsection
