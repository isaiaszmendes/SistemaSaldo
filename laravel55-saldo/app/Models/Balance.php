<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\User;

class Balance extends Model
{
    public $timestamps = false;

    # Depositar
    # Essa função recebe um float e retorna um array
    public function deposit(float $value): Array
    {
    	DB::beginTransaction();

    	$totalBefore = $this->amount ?? 0;
    	$this->amount += number_format($value, 2, '.', '');
    	$deposit = $this->save();

    	$historic = auth()->user()->historics()->create([
    		'type' 			=> 'I', // Tipo de Inserir | Entrada
			'amount' 		=> $value,
			'total_before' 	=> $totalBefore,
			'total_after' 	=> $this->amount,
			'date' 			=> date('Ymd'),
    	]);

    	if ($deposit && $historic){
    		
    		DB::commit();

    		return [
    			'success' => true,
    			'message' => 'Recarga inserida com sucesso!',
    		];
    	}else{
    		DB::rollBack();

    		return [
				'success' => false,
				'message' => 'Falha ao recargar!',
			];
    	}
    }

    #sacar 
    public function withdraw(float $value): Array
    {
        if ($this->amount < $value)
            return [
                'success' => false,
                'message' => 'Valor de saque é maior do que o permitido',
            ];

        DB::beginTransaction();

        $totalBefore = $this->amount ?? 0;
        $this->amount -= number_format($value, 2, '.', '');
        $withdraw = $this->save();

        $historic = auth()->user()->historics()->create([
            'type'          => 'O', // Tipo de Inserir | Entrada
            'amount'        => $value,
            'total_before'  => $totalBefore,
            'total_after'   => $this->amount,
            'date'          => date('Ymd'),
        ]);

        if ($withdraw && $historic){
            
            DB::commit();

            return [
                'success' => true,
                'message' => 'Saque realizado com sucesso!',
            ];
        }else{
            DB::rollBack();

            return [
                'success' => false,
                'message' => 'Falha ao sacar!',
            ];
        }
    }
    public function transfer(float $value, User $sender): Array
    {

    }
}

// 