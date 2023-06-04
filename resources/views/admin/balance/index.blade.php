@extends('adminlte::page')

@section('title', 'Home Dashboard')

@section('content_header')
    <h1>Dashboard</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
    </ol>
@stop

@section('content')
@include('admin.includes.alerts')
<div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>R$ {{ number_format($amount, 2, ',', '') }}<sup style="font-size: 20px"></sup></h3>
             
            <p>Saldo</p>
              </div>
              <div class="icon">
                <i class="ion ion-cash"></i>
              </div>

              <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


@stop