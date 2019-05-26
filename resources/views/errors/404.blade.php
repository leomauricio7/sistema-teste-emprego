@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
<section class="content-header">
    <h1>
        Painel
        <small>Administrativo</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Painel</a></li>
        <li class="active">404</li>
    </ol>
</section>
@stop

@section('content')
<section class="content">
    <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>

        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! página não encontrada.</h3>

            <p>
                Não foi possível encontrar a página que você estava procurando. 
                Enquanto isso, você pode retornar ao <a href="{{ route('panel.home') }}">painel</a> ou tentar usar o formulário de pesquisa.
            </p>

            <form class="search-form">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Pesquisar">

                    <div class="input-group-btn">
                        <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <!-- /.input-group -->
            </form>
        </div>
        <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
</section>
@stop