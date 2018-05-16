@extends('adminlte::page')

@section('title', 'Nova Recarga')

@section('content_header')
    <h1 class="text-info" >Fazer Saque</h1>

    <ol class="breadcrumb">
    	<li><a href="">Dashboard</a></li>
    	<li><a href="">Saldo</a></li>
    	<li><a href="">Depositar</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
    	<div class="box-header">
			<h3>Fazer Saque</h3>
    	</div>
    	<div class="box-body">
    		@include('admin.includes.alerts')
    		<!-- O action esta enviando para a rota que por sua vez enviara para o controller e buscará a funcao() que faz alguma coisa -->
    		<form method="POST" action="{{ url('admin/balance/withdraw') }}" > 
   				{!! csrf_field() !!} 
    			<div class="form-group">
    				<input type="text" name="value" class="form-control" placeholder="Valor do Saque">
    			</div>
    			<div class="form-group">
    				<button type="submit" class="btn btn-success">Sacar</button>
    			</div>
    		</form>
    	</div>
    </div>
@stop