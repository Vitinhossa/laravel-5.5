<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home.index');
    }

    

// --> api full 1
    public function gateway_full_index1()
    {
        return view('admin.full.index1');

    }


    public function gateway_full_api1()
    {
        return view('admin.full.api1');
    }


public function gateway_full_index2()
{
    return view('admin.full.index2');

}


public function gateway_full_api2()
{
    return view('admin.full.api2');
}
//


//Lojas

public function americanas_index()
{
    return view('admin.americanas.index');
}

public function americanas_api()
{
    return view('admin.americanas.api');
}

//
public function shoptime_index()
{
    return view('admin.shoptime.index');
}

public function shoptime_api()
{
    return view('admin.shoptime.api');
}

//
public function magazine_index()
{
    return view('admin.magazine.index');
}

public function magazine_api()
{
    return view('admin.magazine.api');
}

//
public function netshoes_index()
{
    return view('admin.netshoes.index');
}

public function netshoes_api()
{
    return view('admin.netshoes.api');
}

public function centauro_index()
{
    return view('admin.centauro.index');
}

public function centauro_api()
{
    return view('admin.centauro.api');
}


public function nike_index()
{
    return view('admin.nike.index');
}

public function nike_api()
{
    return view('admin.nike.api');
}


public function submarino_index()
{
    return view('admin.submarino.index');
}

public function submarino_api()
{
    return view('admin.submarino.api');
}

public function kabum_index()
{
    return view('admin.kabum.index');
}

public function kabum_api()
{
    return view('admin.kabum.api');
}


public function netflix_index()
{
    return view('admin.netflix.index');
}

public function netflix_api()
{
    return view('admin.netflix.api');
}


public function spotify_index()
{
    return view('admin.spotify.index');
}

public function spotify_api()
{
    return view('admin.spotify.api');
}


public function pagseguro_index()
{
    return view('admin.pagseguro.index');
}

public function pagseguro_api()
{
    return view('admin.pagseguro.api');
}



}
