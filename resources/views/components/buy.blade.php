
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

	<buy :balance="{{ $data->value }}" :data="{{ json_encode($data->coins()) }}">
		<template slot="csrf-field">{{ csrf_field() }}</template>
	</buy>

	<div class="column">
		<h3>Buy History</h3>
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
				@foreach($data->buys->sortByDesc('id') as $buy)
				<tr>
				<td>{{ $buy->id }} </td>
				<td>{{ $buy->coin->name }} </td>
				<td>{{ $buy->quantity }} </td>
				<td><span class="icon is-small"><i class="fa fa-inr"></i></span>{{ $buy->amount }} </td>
				<td><span class="icon is-small"><i class="fa fa-inr"></i></span>{{ $buy->rate }} </td>
				<td>{{ $buy->created_at }} </td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

</div>
