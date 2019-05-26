@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
<section class="content-header">
  <h1>
    Galerias
    <small>Cadastradas</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Painel</a></li>
    <li class="active">Galerias</li>
  </ol>
</section>
@stop

@section('content')
<div class="row">
  @foreach($galerias as $galeria)
  <a href="{{ route('panel.galeria.show', $galeria->id) }}" class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-image"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">{{ $galeria->title }}</span>
        <span class="info-box-number">{{ count($galeria->imagems) }} <i class="fa fa-image"></i></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </a>
  @endforeach
</div>
@stop