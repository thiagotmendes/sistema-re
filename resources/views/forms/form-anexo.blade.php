@extends('layout.master')
@section('title', 'Cadastro de Usuários')
@section('container')
  @if(isset($_GET['msg']) and $_GET['msg'] == 'anexerro')
    <div class="alert alert-danger">
      Erro ao <strong>anexar</strong> o arquivo! por favor verifique a <strong>extenção</strong> permitida.
    </div>
  @endif
  <div class="row">
    <div class="col-md-8">
      @if(empty($grid_interacoes))
        <div class="alert alert-danger">
          Nenhuma interação inserida para este usuário
        </div>
      @else
        @foreach($grid_interacoes as $interacoes)
          <div class="interacoes-grid">
            <div class="title-interact">
              {{ $interacoes->assunto }}
              <div class="pull-right">
                <span class="label label-primary">{{ date('d/m/Y', strtotime($interacoes->idanexoUsuario)) }}</span>
                <a href="<?= url('excluiProcess/'.$interacoes->idanexoUsuario) ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="obs">
              {{ $interacoes->observacao }}
            </div>
            <div class="caminho-arquivo">
              <a href="<?= url($interacoes->patchArquivo) ?>" class="btn btn-info" download="{{ $interacoes->patchArquivo }}" target="_blank">
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
            <small>Extensoes permitidas: doc,pdf,txt,docx,xls,xlsx</small>
          </div>
          <div class="form-group">
            <button type="submit" name="button" class="btn btn-primary"> Salvar </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
