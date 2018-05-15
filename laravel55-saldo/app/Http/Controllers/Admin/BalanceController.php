<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BalanceController extends Controller
{
    public function index(){
    	# Teste
    	
    	// dd( auth()->user()->balance()->get() );
    	
    	# Variavel $balance recebe balance->amount
    	# valor do campo amount da tabela balances
    	$balance = auth()->user()->balance;
    	# AMOUNT É O VALOR QUE O USER POSSUI
    	$amount = $balance ? $balance->amount : 0;
    	return view('admin.balance.index', compact('amount'));
    }
    public function deposit()
    {
    	return view('admin.balance.deposit');
    }
    public function depositStore(Request $request)
    {
    	dd($request->all());
    }
}
