

<template>

<div class="notification">
	<form method="POST" action="/sell"  >
		<slot name="csrf-field"></slot>

		<h4 class="has-text-left">Your  Wallet Balance :  
  <label v-for="wallet in data" class="tag" >
	<span class="tag">{{ wallet.coin.name }} </span> {{ wallet.quantity }}
 </label>
 </h4>

<div class="field">
  <p class="control">
  <label v-show="!coinid" class="help is-danger">Please select the coin for selling</label>
  <label v-for="wallet in data" class="radio" >
	  <input type="radio" v-model="coinid" name="coin_id" :value="wallet.coin.id" v-on:change="walletselected(wallet.id,wallet.quantity)"> {{ wallet.coin.name }}
	  <input type="hidden" name="wallet_id" :value="wallet.id" v-model="walletid">
	  <input type="hidden" name="balance" :value="balance" v-model="balance">
	  <input v-if="coinid == 1" type="hidden" name="rate" :value="btc" v-model="rate">
	  <input v-if="coinid == 2" type="hidden" name="rate" :value="eth" v-model="rate">
	  <input v-if="coinid == 3" type="hidden" name="rate" :value="xrp" v-model="rate">
	  <input v-if="coinid == 4" type="hidden" name="rate" :value="xlm" v-model="rate">

  </label>
  </p>

</div>

	<div class="field has-addons">
	<p class="control">
		<span class="select is-large">
		<select>
			<option>{{ coincode }}</option>
      		</select>
    		</span>
  	</p>
 	 <p class="control">
	 <input class="input is-large" name="quantity" type="text" :placeholder="quantityof" v-model="quantity" v-on:keyup="amountcalc" required>
	  	<input type="hidden" name="amount" :value="amount" v-model="amount">
	  	<input type="hidden" name="commission" :value="commission" v-model="commission">
  	</p>
  	<p class="control">
		<button class="button is-primary is-large">Sell</button>
  	</p>
	</div>			

<div class="field">
  <p class="control">
  <label class="is-large label">You are about to sell {{ quantity }} {{ coincode }} </label>
  </p>
</div>

<div class="field">
  <p class="control">
    <label class="checkbox">
      <input type="checkbox" name="termsandc" v-model="termsandc"  v-on:change="!termsandc">
      I agree to the <a href="#">terms and conditions</a>
    </label>
  </p>
</div>



	</form>
</div>

</template>	



<script>
    export default {
	props : ["data"],
	    data : function() {
		return {
			btc : "",
			eth : "",
			xrp : "",
			xlm : "",
			walletid : "",
			quantity : "",
			amount : "",
			rate : "",
			coinid : 0,
			coinname : "",
			coincode : "",
			termsandc : false,
			commission : 0 ,
			tmpamnt : "",
			balance : ""

		}
	    },
	    computed : {
		quantityValue : function() {
			return this.rate;
		},
		quantityof : function() {
			return "Quantity of " + this.coinname ;
		}
	    },
	methods : {
		onSubmit() {
		axios.post('/buy',
	       			{
			   	 	coin_id: this.coinid,
			   	 	wallet_id: this.walletid,
			   	 	amount: this.amount,
			   	 	rate: this.rate,
			   	 	quantity: this.quantity
				  })
				.then(function (response) {console.log(response);})
				.catch(function (error) {console.log(error);});
	},
		amountcalc(){
			if(this.coinid == 1) this.rate = this.btc; 
			if(this.coinid == 2) this.rate = this.eth; 
			if(this.coinid == 3) this.rate = this.xrp; 
			if(this.coinid == 4) this.rate = this.xlm;

			this.tmpamnt = (this.quantity * this.rate ).toFixed(2) ;

			this.commission = (this.tmpamnt*0.01*2).toFixed(2) ;	
			this.amount = (this.tmpamnt - this.commission).toFixed(2) ;

		},
		walletselected(walletid,balance){
			this.walletid = walletid;
			if(this.coinid == 1) {  this.rate = this.btc; this.coincode = "BTC"; this.coinname = "Bitcoins"; }
			if(this.coinid == 2) { this.rate = this.eth; this.coincode = "ETH"; this.coinname = "Ethers"; }
			if(this.coinid == 3) { this.rate = this.xrp; this.coincode = "XRP" ; this.coinname = "Ripple"; }
			if(this.coinid == 4) { this.rate = this.xlm; this.coincode = "XLM" ; this.coinname = "Lumens"; }
		
			this.balance = balance;

			this.tmpamnt = (this.quantity * this.rate ) ;

			this.commission = (this.tmpamnt*0.01*2).toFixed(2) ;	
			this.amount = (this.tmpamnt - this.commission).toFixed(2) ;

		},
		    getValues() {
			    console.log("about to call");
				axios.get('https://min-api.cryptocompare.com/data/pricemulti',{ 
				params:	{
						fsyms: "BTC,ETH,XRP,XLM",
						tsyms: "USD"
					}
				})
				.then(response => [
				this.btc = (response.data.BTC.USD * 65).toFixed(2),
				this.eth = (response.data.ETH.USD * 65).toFixed(2),
				this.xrp = (response.data.XRP.USD * 65).toFixed(2),
				this.xlm = (response.data.XLM.USD * 65).toFixed(2),
				])
				.catch(function (error) {console.log(error);
				});

		    }
	    },

        mounted() {
		        this.getValues();

	this.interval = setInterval(function () {
				          this.getValues();
					      }.bind(this), 30000); 
			    
		//this.getINR();
            console.log(this.data);
        }

    }


</script>
    
