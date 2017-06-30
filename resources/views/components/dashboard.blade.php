@php
//dd($data);
@endphp
<div class="column is-10 content">
	<div class="column is-half-desktop is-full-mobile">
		<section class="panel">
              		<p class="panel-heading">UnoCoin</p><p> Spread of last 1 Hour for Every 5 Minute interval</p>
			<div id="app" class="panel-block">
				<graph :labels='{{ $data->pluck("id")->toJson() }} ' 
					:buy='{{ $data->pluck("buy")->toJson() }} ' 
					:sell='{{ $data->pluck("sell")->toJson() }}'	 >
				</graph>
			</div>
		</section>
	</div>
</div>


