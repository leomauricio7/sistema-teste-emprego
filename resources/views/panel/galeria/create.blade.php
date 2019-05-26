@extends('adminlte::page')

@section('title', 'Nova Galeria')

@section('content_header')
<section class="content-header">
    <h1>
      Clientes
      <small>Cadastro</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Painel</a></li>
      <li><a href="#">Galeria</a></li>
      <li class="active">Nova Galeria</li>
    </ol>
  </section>
@stop

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
 
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if(isset($errors) && count($errors) > 0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">
        {{ $error }}
    </div>
    @endforeach
@endif

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Cadastro de Nova Galeria</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form method="post" action="{{ route('panel.galeria.store') }}">
        {!! csrf_field() !!}
        <div class="box-body">
            <div class="form-group">
                <label for="title">Titulo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome Completo">
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea class="form-control" id="description" name="description" placeholder="Descrição da galeria"></textarea>
            </div>
            <!-- <div class="form-group">
                <label for="imagem">Imagens</label>
                <input type="file" class="form-control" multiple id="imagem" name="images[]" placeholder="Senha">
                <p class="help-block">faça o uploud das imagens para a galeria.</p>
            </div> -->

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-info">Cadastrar</button>
        </div>
    </form>
</div>
@stop