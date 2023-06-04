@extends('adminlte::page')

@section('title', 'Home Dashboard')

@section('content_header')
    <h1>Dashboard</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
    </ol>
@stop

@section('content')
<div class="box">
        <div class="box-header">

        <a href="{{ route('balance.deposit') }}" class="btn btn-primary"><i class="fa fa-cart-arrow-down"></i> Recarregar</a>
     

        <a href="{{ route ('balance.withdraw') }}" class="btn btn-danger"><i class="fa fa-cart-arrow-down"></i> Sacar</a>
  

        </div>

        <div class="box-body">
        @include('admin.includes.alerts')
<div class="small-box bg-green">
  <div class="inner">
    <h3>R$ {{ number_format($amount, 2, ',', '') }}</h3>

  </div>
  <div class="icon">
  <i class="ion ion-cash"></i>
  </div>
  <a href="#" class="small-box-footer"> </a>
</div>

                           
</div>



@stop