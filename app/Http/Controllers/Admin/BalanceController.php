<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Http\Requests\MoneyValidationFormRequest;


class BalanceController extends Controller
{
   
   
    public function index()
    {
/*
        dd( auth ()->user());
        dados financeiro do usuário
        dd( auth()->user()->balance()->get() );
*/
       $balance = auth()->user()->balance;
       $amount = $balance ? $balance->amount : 0;
      
        return view('admin.balance.index', compact('amount'));
    }




public function deposit()
{
    return view('admin.balance.deposit');
}

public function depositStore(MoneyValidationFormRequest $request)
{

 //$balance->deposit($request->value);
    auth()->user()->balance()->firstOrCreate([]);

 $balance = auth()->user()->balance()->firstOrCreate([]);
 $response = $balance->deposit($request->value);

if ($response['success'])
return redirect()->route('admin.home')->with('success', $response['message']);

return redirect()->back()->with('error', $response['messages']);
}


public function withdraw()
{

return view('admin.balance.withdraw');
}


public function withdrawStore(MoneyValidationFormRequest $request)
{

 // $balance->deposit($request->value);
 //dd(auth()->user()->balance()->firstOrCreate([]));

 $balance = auth()->user()->balance()->firstOrCreate([]);
 $response = $balance->withdraw($request->value);

if ($response['success'])
return redirect()->route('admin.home')->with('success', $response['message']);  //Sucesso ao retirar

return redirect()->back()->with('error', $response['messages']);
}



}





