@php
//dd($data->unrealizedGains());
@endphp
<div class="column is-10 content" >
@if(empty($data))
	<form method="POST" action="/accounts">
	{{ csrf_field() }}
			<button class="button is-primary">Create An Account</button>
	</form>
@else

<div class="tile is-ancestor">
  <div class="tile is-4 is-vertical is-parent">
    <div class="tile is-child box">
      <p class="title is-dark">Deposit</p>
	<form method="POST" action="/deposit">
	{{ csrf_field() }}
	<div class="field has-addons">
	<p class="control">
		<span class="select">
		<select>
        	<option>₹</option>
      		</select>
    		</span>
  	</p>
 	 <p class="control">
    		<input class="input" name="amount" type="text" placeholder="Amount of money" required>
  	</p>
  	<p class="control">
		<button class="button is-primary">Transfer</button>
  	</p>
	</div>			
	</form>
    </div>
    
<div class="tile is-child box">
      <p class="title is-dark">Withdraw</p>
	<form method="POST" action="/withdraw">
	{{ csrf_field() }}
	<div class="field has-addons">
	<p class="control">
		<span class="select">
		<select>
        	<option>₹</option>
      		</select>
    		</span>
  	</p>
 	 <p class="control">
    		<input class="input" name="amount" type="text" placeholder="Amount of money" required>
  	</p>
  	<p class="control">
		<button class="button is-primary">Transfer</button>
  	</p>
	</div>			
	</form>
</div>

  </div>
  <div class="tile is-parent">
    <div class="tile is-child box">
      <p class="title is-dark">Account Information</p>
	<p> <strong>Account Number :</strong> {{ $data->id }} </p>
	<h1 class="is-large">Balance :  <span class="icon is-medium"><i class="fa fa-inr"></i></span> {{ $data->value }} </h1>
	<h5 class="is-medium">Unrealized Gains : <span class="icon"><i class="fa fa-inr"></i></span> {{ $data->unrealizedGains() }}</h5>
	<p>Profit :</p>
    </div>
  </div>
</div>

<div class="columns">
	<div class="column">
		<h3>Deposit History</h3>
		<table class="table">
  			<thead>
				<th>Txn ID</th>
				<th>Amount</th>
				<th>Status</th>
				<th>Date</th>
			</thead>
			<tbody>
				@foreach($data->deposits as $deposit)
				<tr>
				<td>{{ $deposit->id }} </td>
				<td>{{ $deposit->amount }} </td>
				<td>{{ $deposit->status }} </td>
				<td>{{ $deposit->created_at }} </td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
	<div class="column">
		<h3>Withdrawal History</h3>
		<table class="table">
  			<thead>
				<th>Txn ID</th>
				<th>Amount</th>
				<th>Status</th>
				<th>Date</th>
			</thead>
			<tbody>
				@foreach($data->withdrawals as $withdrawal)
				<tr>
				<td>{{ $withdrawal->id }} </td>
				<td>{{ $withdrawal->amount }} </td>
				<td>{{ $withdrawal->status }} </td>
				<td>{{ $withdrawal->created_at }} </td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

</div>

@endif


</div>
