@extends('adminlte::page')

@section('title', 'Noco cliente')

@section('content_header')
<section class="content-header">
    <h1>
      Clientes
      <small>Cadastro</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Painel</a></li>
      <li><a href="#">Clientes</a></li>
      <li class="active">Novo Cliente</li>
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
        <h3 class="box-title">Cadastro de Novo Cliente</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form method="post" action="{{ route('panel.users.update',$user->id) }}">
        {!! csrf_field() !!}
        <div class="box-body">
            <div class="form-group">
                <label for="nome">Nome Completo</label>
                <input type="text" class="form-control" id="nome" name="name" value="{{$user->name}}" placeholder="Nome Completo" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" placeholder="E-mail" required>
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-info">Salvar</button>
        </div>
    </form>
</div>
@stop