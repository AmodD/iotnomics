
<div class="column is-10 content has-text-left" id="app">

	<wallet name="Bitcoins" coin_id="1"  labels="is-info" :data="{{ json_encode($data->wallets()->get()->keyBy('coin_id')->get(1)) }}"  code="BTC" showcreate="{{ !$data->wallets()->get()->contains('coin_id','1')}}">
		<template slot="csrf-field">{{ csrf_field() }}</template>
	</wallet>
	<wallet name="Ethers" coin_id="2" labels="is-danger"  :data="{{ json_encode($data->wallets()->get()->keyBy('coin_id')->get(2)) }}"  code="ETH" showcreate="{{ !$data->wallets()->get()->contains('coin_id','2')}}">
		<template slot="csrf-field">{{ csrf_field() }}</template>
	</wallet>
	<wallet name="Ripple" coin_id="3" labels="is-success"  :data="{{ json_encode($data->wallets()->get()->keyBy('coin_id')->get(3)) }}"  code="XLR" showcreate="{{ !$data->wallets()->get()->contains('coin_id','3')}}">
		<template slot="csrf-field">{{ csrf_field() }}</template>
	</wallet>
	<wallet name="Lumens" coin_id="4" labels="is-warning"  :data="{{ json_encode($data->wallets()->get()->keyBy('coin_id')->get(4)) }}"  code="XLM" showcreate="{{ !$data->wallets()->get()->contains('coin_id','4')}}">
		<template slot="csrf-field">{{ csrf_field() }}</template>
	</wallet>
</div>
