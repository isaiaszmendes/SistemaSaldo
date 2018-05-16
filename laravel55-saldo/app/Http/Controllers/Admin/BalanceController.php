<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Http\Requests\MoneyValidationFormRequest;

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

    public function depositStore(MoneyValidationFormRequest $request)
    {
    	// $request - Recebe valor do formulario
        // $balance recebe o valor  que vem d
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->deposit($request->value);

        if ($response['success']) 
            return redirect()
                    ->route('admin.balance')
                    ->with('success', $response['message']);
        
        return redirect()
                    ->back()
                    ->with('error', $response['message']);
    }

    public function withdraw()
    {
        return view('admin.balance.withdraw');
    }

    public function withdrawStore(MoneyValidationFormRequest $request)
    {
        $request->all();
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->withdraw($request->value);

        if ($response['success']) 
            return redirect()
                    ->route('admin.balance')
                    ->with('success', $response['message']);
        
        return redirect()
                    ->back()
                    ->with('error', $response['message']);
    }
}

