@extends('adminlte::page')

@section('title', 'Galerias')

@section('content_header')
<section class="content-header">
  <h1>
    Galeria
    <small>Cadastradas</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Painel</a></li>
    <li><a href="#">Galerias</a></li>
    <li class="active">Galerias Cadatradas</li>
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
    <h3 class="box-title">Galerias Cadastradas</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
        <tr role="row">
          <th rowspan="1" colspan="1">ID</th>
          <th rowspan="1" colspan="1">Titulo</th>
          <th rowspan="1" colspan="1">Descrição</th>
          <th rowspan="1" colspan="1">Criado em</th>
          <th rowspan="1" colspan="1"><i class="fa fa-cogs"></i></th>
        </tr>
      </thead>
      <tbody>
        @foreach($galerias as $galeria)
        <tr role="row" class="odd">
          <td class="sorting_1">{{ $galeria->id }}</td>
          <td>{{ $galeria->title }}</td>
          <td>{{ $galeria->description }}</td>
          <td>{{ $galeria->created_at->format('d/m/Y') }}</td>
          <td>
            <a href="{{ route('panel.galeria.show',$galeria->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
            <a href="{{ route('panel.galeria.edit',$galeria->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
            <a href="{{ route('panel.galeria.destroy',$galeria->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    
  </div>
  <!-- /.box-body -->
</div>
@stop