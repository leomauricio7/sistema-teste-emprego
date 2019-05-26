@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
<section class="content-header">
  <h1>
    Clientes
    <small>Cadastrados</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Painel</a></li>
    <li><a href="#">Clientes</a></li>
    <li class="active">Clientes Cadatrados</li>
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
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Clientes Cadastrados</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
        <tr role="row">
          <th rowspan="1" colspan="1">ID</th>
          <th rowspan="1" colspan="1">Nome</th>
          <th rowspan="1" colspan="1">E-mail</th>
          <th rowspan="1" colspan="1">Tipo</th>
          <th rowspan="1" colspan="1">Criado em</th>
          <th rowspan="1" colspan="1"><i class="fa fa-cogs"></i></th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr role="row" class="odd">
          <td class="sorting_1">{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->tipo }}</td>
          <td>{{ $user->created_at->format('d/m/Y') }}</td>
          <td>
            <a href="{{ route('panel.users.edit',$user->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
            <a href="{{ route('panel.users.destroy',$user->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    
  </div>
  <!-- /.box-body -->
</div>
@stop