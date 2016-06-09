@extends('layout.master')

@section('title', 'Cadastro de Usuários')
@section('container')
  <div class="col-md-8">
    @foreach($grid_interacoes as $interacoes)
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
          <a href="{{ $interacoes->patchArquivo }}" class="btn btn-info" download="{{ $interacoes->patchArquivo }}"> Arquivo em anexo <i class="fa fa-file" aria-hidden="true"></i> </a>
        </div>
      </div>
    @endforeach
  </div>
  <div class="col-md-4">
    <div class="form-anexo">
      <header>
        Acompanhamento
      </header>
      <form class="" action="<?= route('anexa-arquivo') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="assunto">Assunto</label>
          <input type="text" name="assunto" class="form-control" id="" placeholder="">
          <input type="hidden" name="idusuario" value="{{ $id }}">
          <?= csrf_field(); ?>
        </div>
        <div class="form-group">
          <label for="obs">Observações</label>
          <textarea name="observacoes" class="form-control" cols="20"></textarea>
        </div>
        <div class="form-group">
          <label for=""></label>
          <input type="file" name="arquivo" value="" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" name="button" class="btn btn-primary"> Salvar </button>
        </div>
      </form>
    </div>
  </div>
@endsection
