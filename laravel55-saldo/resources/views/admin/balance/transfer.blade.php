@extends('adminlte::page')

@section('title', 'Transferir Saldo')

@section('content_header')
    <h1 class="text-info" >Fazer Transferência</h1>

        <ol class="breadcrumb">
    	<li><a href="">Dashboard</a></li>
    	<li><a href="">Saldo</a></li>
        <li><a href="">Depositar</a></li>
    	<li><a href="">Transferir</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
    	<div class="box-header">
			<h3>Transferir Saldo (Informe o Recebedor)</h3>
    	</div>
    	<div class="box-body">
    		@include('admin.includes.alerts')
    		<!-- O action esta enviando para a rota que por sua vez enviara para o controller e buscará a funcao() que faz alguma coisa -->
    		<form method="POST" action="{{ route('confirm.transfer') }}" > 
   				{!! csrf_field() !!} 
    			<div class="form-group">
    				<input type="text" name="sender" class="form-control" placeholder="Informação de quem vai receber o saque (Nome ou E-mail)">
    			</div>
    			<div class="form-group">
    				<button type="submit" class="btn btn-success">Proxima Etapa</button>
    			</div>
    		</form>
    	</div>
    </div>
@stop