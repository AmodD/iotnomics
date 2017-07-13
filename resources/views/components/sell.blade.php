
<div class="column is-10 content" id="app">

<div class="tile is-ancestor ">
  <div class="tile is-parent">
    <article class="tile is-child box">
    <example name="BITCOIN" code="BTC"></example>
	</article>
  </div>
  <div class="tile is-parent">
    <article class="tile is-child box">
    <example name="ETHER" code="ETH"></example>
    </article>
  </div>
  <div class="tile is-parent">
    <article class="tile is-child box">
    <example name="RIPPLE" code="XRP"></example>
    </article>
  </div>
  <div class="tile is-parent">
    <article class="tile is-child box">
    <example name="LUMENS" code="XLM"></example>
    </article>
  </div>
</div>
	
	@if($errors->any()) 
		<errors :errors="{{$errors->toJson()}}"></errors>
	@endif

<sell :balance="{{ $data->value }}" :data="{{ json_encode($data->coins()) }}">
	<template slot="csrf-field">{{ csrf_field() }}</template>
</sell>


	<div class="column">
		<h3>Sell History</h3>
		<table class="table">
  			<thead>
				<th>Txn ID</th>
				<th>Coin</th>
				<th>Quantity</th>
				<th>Amount</th>
				<th>Rate</th>
				<th>Date</th>
			</thead>
			<tbody>
				@foreach($data->sells->sortByDesc('id') as $sell)
				<tr>
				<td>{{ $sell->id }} </td>
				<td>{{ $sell->coin->name }} </td>
				<td>{{ $sell->quantity }} </td>
				<td><span class="icon is-small"><i class="fa fa-inr"></i></span>{{ $sell->amount }} </td>
				<td><span class="icon is-small"><i class="fa fa-inr"></i></span>{{ $sell->rate }} </td>
				<td>{{ $sell->created_at }} </td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>


</div>
