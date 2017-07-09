<template>
	<div class="has-text-left">
		<p class="has-text-centered"><strong>{{ name }} </strong></p>
		<hr>
		<p><strong> 1 {{ code }} =  </strong> : {{ price }} </p>
		<p><strong> Last Traded {{ code }} Amount </strong> : {{ lastvolBTC }} </p>
		<p><strong> Last Traded INR Amount </strong> : {{ lastvolINR }} </p>
		<hr>
		<p><strong> Last 24 hour volume {{ code }} </strong> : {{ dayvolBTC }} </p>
		<p><strong> Last 24 hour volume INR </strong> : {{ dayvolINR }} </p>
		<hr>
		<p><strong> Day High </strong> : {{ dayhigh }} </p>
		<p><strong> Day Low </strong> : {{ daylow }} </p>
		<p><strong> Day Change % </strong> : {{ daychange }} </p>
	</div>
</template>

<script>

export default {
    props : ['name','code'],
	    data : function() {
		return {
			inr : "",
			interval : null,
			price : "",
			lastvolBTC : "",
			lastvolINR : "",
			dayvolBTC : "",
			dayvolINR : "",
			dayhigh : "",
			daylow : "",
			daychange : ""

		}
	    },
	    methods : {
		    getValues() {
			    console.log("about to call");
				axios.get('https://min-api.cryptocompare.com/data/generateAvg',{ 
				params:	{
						fsym: this.code,
						tsym: "INR",
						markets : this.name
					}
				})
				.then(response => [
				this.price = response.data.DISPLAY.PRICE,
				this.lastvolBTC = response.data.DISPLAY.LASTVOLUME,
				this.lastvolINR = response.data.DISPLAY.LASTVOLUMETO,
				this.dayvolBTC = response.data.DISPLAY.VOLUME24HOUR,
				this.dayvolINR = response.data.DISPLAY.VOLUME24HOURTO,
				this.dayhigh = response.data.DISPLAY.HIGH24HOUR,
				this.daylow = response.data.DISPLAY.LOW24HOUR,
				this.daychange = response.data.DISPLAY.CHANGEPCT24HOUR
				])
				.catch(function (error) {console.log(error);
				});

		    }
	    },
        mounted() {
		        this.getValues();

//			this.interval = setInterval(function () {
//				          this.getValues();
//					      }.bind(this), 10000); 
			    
		//this.getINR();
            console.log('Component mounted.')
        }


}

</script>>
