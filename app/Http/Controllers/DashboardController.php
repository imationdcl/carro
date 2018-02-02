<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carro;

class dashboardController extends Controller
{
    public function carros(){
    	$data = Carro::getCarts();
    	
    	$pais_origen = Carro::carrosPaisOrigen($data->carts);
    	$ciudad_destino_popular = Carro::ciudadesPorPularidad($data->carts);
    	$pais_mayor_reward = Carro::paisesConMejorRecompensa($data->carts);
    	
    	return view('carro.dashboard',compact('pais_origen', 'ciudad_destino_popular', 'pais_mayor_reward'));
    }
}
