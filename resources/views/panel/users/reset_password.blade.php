@extends('adminlte::page')

@section('title', 'Resetar Senha')

@section('content_header')
<section class="content-header">
    <h1>
      Clientes
      <small>Cadastro</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Painel</a></li>
      <li><a href="#">Clientes</a></li>
      <li class="active">Editar Senha</li>
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

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Edição de senha</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form method="post" action="{{ route('panel.users.reset.password') }}">
        {!! csrf_field() !!}
        <div class="box-body">
            <div class="form-group">
                <label for="password">Nova Senha</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Nova Senha" required>
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-info">Alterar</button>
        </div>
    </form>
</div>
@stop