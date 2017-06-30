<template>
	<div >	<p >{{ name }}  <h1><span class="icon is-medium"><i class="fa fa-inr"></i></span>&nbsp;{{ inr }}    
		</h1>  </p> 
	</div>
</template>

<script>
    export default {
	    props : ['name','code'],
	    data : function() {
		return {
			inr : "",
			interval : null
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
				.then(response => this.inr = response.data.INR)
				.catch(function (error) {console.log(error);
				});

		    }
	    },
        mounted() {
		        this.getINR();

			this.interval = setInterval(function () {
				          this.getINR();
					      }.bind(this), 30000); 
			    
		//this.getINR();
            console.log('Component mounted.')
        }
    }
</script>
