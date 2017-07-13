<template>
	<div>	<p >{{ name }} 
		<div v-if="showmkt">
		<h3><small>Market Price</small> <span class="icon"><i class="fa fa-inr"></i></span>&nbsp;{{ mktinr }}</h3>  
		<h3><small>Our Price</small> <span class="icon"><i class="fa fa-inr"></i></span>&nbsp;{{ ourinr }}</h3> 
	        </div>
		<div v-if="!showmkt">	
		<h1><span class="icon is-medium"><i class="fa fa-inr"></i></span>&nbsp;{{ ourinr }}</h1> 
		</div>	
		</p> 
	</div>
</template>

<script>
    export default {
	    props : ['name','code','showmkt','margins'],
	    data : function() {
		return {
			mktinr : "",
			ourinr : "",
			interval : null,
		}
	    },
	    methods : {
		    getINR() {
			    console.log("about to call");
		
	    		    axios.get('https://min-api.cryptocompare.com/data/price',{ 
				params:	{
						fsym: this.code,
						tsyms: "INR"
					}
				})
				.then(response => this.mktinr = (response.data.INR).toFixed(2))
				.catch(function (error) {console.log(error);
				});

	    		    axios.get('https://min-api.cryptocompare.com/data/price',{ 
				params:	{
						fsym: this.code,
						tsyms: "USD"
					}
				})
				.then(response => this.ourinr = (
				(response.data.USD)*(65)
			       	+
				(response.data.USD)*(65)*(0.01)*1
			       //	+
			//	(response.data.USD)*(this.margins.usdinr)*(0.01)*(this.margins.tax)
			  //     	+
			//	(response.data.USD)*(this.margins.usdinr)*(0.01)*(this.margins.exchange)
			  //     	+
		//		(response.data.USD)*(this.margins.usdinr)*(0.01)*(this.margins.fees)
				).toFixed(2))
				.catch(function (error) {console.log(error);
				});

		    }
	    },
        mounted() {
		        this.getINR();

			this.ourcomm = this.ourinr ;
//			this.ourcomm = (this.ourinr)*(0.01)*(this.margins.profit) + 
//					(this.ourinr)*(0.01)*(this.margins.tax) + 
//					(this.ourinr)*(0.01)*(this.margins.exchange) + 
//					(this.ourinr)*(0.01)*(this.margins.fees)  ;

			this.interval = setInterval(function () {
				          this.getINR();
					      }.bind(this), 30000); 
			    
		//this.getINR();
            console.log('Component mounted.')
        }
    }
</script>
