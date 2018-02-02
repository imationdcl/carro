<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
	public static function getCarts(){
		$url = "http://sb.pckz.cl/testdev/get/carts";

		return json_decode(file_get_contents($url));
	}

	public static function carrosPaisOrigen($carros){	
		$pais = [];

		foreach ($carros as  $carro) {
			$reward = 0;
			$total = 0;

			foreach ($carros as $v2) {

				if($carro->from_location->country == $v2->from_location->country){
					$reward 	+= $v2->reward;
					$total 		+= 1;
					$pais[$v2->from_location->country] = array('reward' => $reward, 'total' => $total);
				}
			}
		}
		return $pais;
	}

	public static function ciudadesPorPularidad($carros){
		$aux_ciudad = [];
		$ciudad 	= [];
		
		foreach ($carros as  $carro) {
			$quantity 	= 0;

			foreach ($carro->products as $product) {
				$quantity += $product->quantity;
				$aux_ciudad[$carro->to_location->name][] = array("quantity"=>$quantity);
			}
		}

		foreach ($aux_ciudad as $key => $value) {
			$total = 0;
			foreach ($aux_ciudad[$key] as $value2) {
				$total += $value2['quantity'];
				$ciudad[$key] = array("quantity"=>$total);
			}
		}
		arsort($ciudad);
		
		return $ciudad;
	}

	public static function paisesConMejorRecompensa($carros){
		$pais = Carro::carrosPaisOrigen($carros);
		arsort($pais);
		
		return $pais;
	}
}
