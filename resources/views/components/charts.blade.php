
<div class="column is-10 content" id="app">
<div class="columns" >
	<div class="column is-half-desktop is-full-mobile">
		<div class="box">
			<matrix name='EthexIndia' code='ETH'></matrix>
		</div>
	</div>
	<div class="column is-half-desktop is-full-mobile">
		<div class="box">
			<matrix name='Unocoin' code='BTC'></matrix>
		</div>
	</div>
</div>
<div class="columns">
	<div class="column is-half-desktop is-full-mobile">
		<section class="panel">
              		<p class="panel-heading">UnoCoin</p><p> Spread of last 12 hours for every hour interval</p>
			<div  class="panel-block">
				<graph :labels='{{ $data->pluck("id")->toJson() }} ' 
					:buy='{{ $data->pluck("buy")->toJson() }} ' 
					:sell='{{ $data->pluck("sell")->toJson() }}'	 >
				</graph>
			</div>
		</section>
	</div>
</div>
</div>
