<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Balance extends Model
{
    //private $table = 'balance';
   public $timestamps = false;


public function deposit(float $value) : Array
{

    DB::beginTransaction();

   $totalBefore = $this->amount ? $this->amount : 0;
   $this->amount += number_format($value, 2, '.', '');
   $deposit = $this->save();

  $historic = auth()->user()->historics()->create([
    'type'           => 'I',
    'amount'         => $value,
    'total_before'   => $totalBefore,
    'total_after'    => $this->amount,
    'date'           => date('Ymd'),
   ]);

if ($deposit && $historic) {

DB::commit();

return [ 
    'success' => true,
    'message' => 'Sucesso ao Recarregar'
];
} else {
    DB::rollback();


return [
    'success' => false,
    'message' => 'Falha ao carregar'

];

} 
}
public function withdraw(float $value) : Array 
{

    if($this->amount < $value)
    return [
'success' => false,
'messages' => 'Saldo Insuficiente',
    ];

   DB::beginTransaction();

    $totalBefore = $this->amount ? $this->amount : 0;
    $this->amount -= number_format($value, 2, '.', '');
    $withdraw = $this->save();
 
   $historic = auth()->user()->historics()->create([
     'type'           => '0',
     'amount'         => $value,
     'total_before'   => $totalBefore,
     'total_after'    => $this->amount,
     'date'           => date('Ymd'),
    ]);
 
 if ($withdraw && $historic) {
 
 DB::commit();
 
 return [ 
     'success' => true,
     'message' => 'Sucesso ao Retirar'
 ];
 } else {
     DB::rollback();
 
 
 return [
     'success' => false,
     'message' => 'Falha ao Retirar'
 
 ];
 
 } 

}

  }
