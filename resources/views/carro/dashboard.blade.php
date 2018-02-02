@extends('layout.main')

@section('content')

<h2>Carros pais origen</h2>
<div class="table-responsive">
	<table class="table table-striped table-sm">
		<thead>
			<tr>
				<th>Pais</th>
				<th>Reward</th>
				<th>Cantidad</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pais_origen as $key => $valor)
				<tr>
				<td>{{ $key }}</td>
				<td>{{ $valor['reward'] }}</td>
				<td>{{ $valor['total'] }}</td>
				</tr>
			@endforeach
			
		</tbody>
	</table>
</div>

<h2>Ciudades destino</h2>
<div class="table-responsive">
	<table class="table table-striped table-sm">
		<thead>
			<tr>
				<th>Ciudad</th>
				<th>Quantity</th>
			</tr>
		</thead>
		<tbody>
			@foreach($ciudad_destino_popular as $key => $valor)
				<tr>
				<td>{{ $key }}</td>
				<td>{{ $valor['quantity'] }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

<h2>Paises mayor reward</h2>
<div class="table-responsive">
	<table class="table table-striped table-sm">
		<thead>
			<tr>
				<th>Pais</th>
				<th>Reward</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pais_mayor_reward as $key => $valor)
				<tr>
				<td>{{ $key }}</td>
				<td>{{ $valor['reward'] }}</td>
				</tr>
			@endforeach
			
		</tbody>
	</table>
</div>
@endsection