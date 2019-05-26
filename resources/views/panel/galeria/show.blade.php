@extends('adminlte::page')

@section('title', 'Galeria')

@section('content_header')
<section class="content-header">
    <h1>
        Galeria
        <small>{{ $galeria->title }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Painel</a></li>
        <li><a href="#">Galeria</a></li>
        <li class="active">{{ $galeria->title }}</li>
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

<div class="box box-default collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title">Enviar Imagens</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="display: none;">
        <form method="post" action="{{ route('panel.galeria.send.images', $galeria->id) }}" enctype="multipart/form-data">
        {!! csrf_field() !!}
            <div class="box-body">
                <div class="form-group">
                    <label for="images">Imagens</label>
                    <input type="file" id="images" name="images[]" required>
                    <p class="help-block">Selecione as iamgens para uploud.</p>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
    <!-- /.box-body -->
    <div class="box-footer" style="display: none;">
        Sistema de teste para vaga de estágio
    </div>
</div>
<div class="box">
    <div class="box-header">
        <h3 class="box-title">{{ $galeria->title }}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        @foreach($images as $image)
        <ul class="timeline">
            <!-- timeline time label -->

            <li class="time-label">
                <span class="bg-green">
                    {{ $image->created_at->format('d/m/Y') }}
                </span>
            </li>
            <!-- /.timeline-label -->

            <!-- timeline item -->
            <li>
                <i class="fa fa-camera bg-purple"></i>

                <div class="timeline-item">
                    <h3 class="timeline-header"><a href="#">{{ $galeria->title }}</h3>

                    <div class="timeline-body">
                        <img src="{{ url('galeria/'.$galeria->id.'/'.$image->image) }}" alt="..." class="margin" width="300px">
                    </div>
                </div>
            </li>

            <!-- END timeline item -->
            <li>
                <i class="fa fa-clock-o bg-gray"></i>
            </li>
        </ul>
        @endforeach
    </div>
    <!-- /.box-body -->
</div>
@stop