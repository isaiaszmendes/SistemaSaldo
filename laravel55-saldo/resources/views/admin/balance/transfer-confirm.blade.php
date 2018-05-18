@extends('adminlte::page')

@section('title', 'Confirmar Transfência Saldo')

@section('content_header')
    <h1 class="text-info" >Confirmar Transfência Saldo</h1>

        <ol class="breadcrumb">
    	<li><a href="">Dashboard</a></li>
    	<li><a href="">Saldo</a></li>
        <li><a href="">Depositar</a></li>
        <li><a href="">Transferir</a></li>
    	<li><a href="">Confirmação</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
    	<div class="box-header">
			<h3>Confirmar Transfência Saldo</h3>
    	</div>
    	<div class="box-body">
    		@include('admin.includes.alerts')
    		<!-- O action esta enviando para a rota que por sua vez enviara para o controller e buscará a funcao() que faz alguma coisa -->
            <p><strong>Recebedor: </strong>{{ $sender->name }}</p>
            <p><strong>Seu Saldo Atual: </strong>{{ number_format($balance->amount, 2, ',', '.') }}</p>
    		<form method="POST" action="{{ route('transfer.store') }}" > 
   				{!! csrf_field() !!} 

                <input type="hidden" name="sender_id" value="{{ $sender->id}}">

    			<div class="form-group">
    				<input type="text" name="value" class="form-control" placeholder="Valor: R$">
    			</div>
    			<div class="form-group">
    				<button type="submit" class="btn btn-success">Transferir</button>
    			</div>
    		</form>
    	</div>
    </div>
@stop