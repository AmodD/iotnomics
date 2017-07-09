@php
//dd($data);
@endphp
<div class="column is-10 content" >
		<h1> Total Commissions : <span class="icon is-medium"><i class="fa fa-inr"></i></span> {{ $data->sum('amount') }} &nbsp;&nbsp;&nbsp; 
		</h1>
		<h3>Trade Book</h3>
		<table class="table">
  			<thead>
				<th>ID</th>
				<th>User</th>
				<th>Trade</th>
				<th>Coin</th>
				<th>Quantity</th>
				<th>Amount</th>
				<th>Commission</th>
				<th>Date</th>
			</thead>
			<tbody>
				@foreach($data as $commission)
				<tr>
				<td>{{ $commission->id }} </td>
				<td>{{ $commission->commissionable->wallet->account->user->name }} </td>
				<td>{{ substr($commission->commissionable_type,4) }} </td>
				<td>{{ $commission->commissionable->coin->name }} </td>
				<td>{{ $commission->commissionable->quantity }} </td>
				<td><span class="icon is-small"><i class="fa fa-inr"></i></span>{{ $commission->commissionable->amount }} </td>
				<td><span class="icon is-small"><i class="fa fa-inr"></i></span>{{ $commission->amount }} </td>
				<td>{{ $commission->created_at }} </td>
				</tr>
				@endforeach
			</tbody>
		</table>
</div>
