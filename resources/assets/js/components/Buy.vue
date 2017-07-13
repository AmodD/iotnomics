
<template>

<div class="notification">
	<form method="POST" action="/buy" >
		<slot name="csrf-field"></slot>

<h4 class="has-text-left">Your  Account Balance : <span class="icon"><i class="fa fa-inr"></i></span> {{ balance }}</h4>
<input type="hidden" name="balance" :value="balance" v-model="balance">

<div class="field">
  <p class="control">
  <label v-show="!coinid" class="help is-danger">Please select the coin for buying</label>
  <label v-for="wallet in data" class="radio" >
	  <input type="radio" v-model="coinid" name="coin_id" :value="wallet.coin.id" v-on:change="walletselected(wallet.id)"> {{ wallet.coin.name }}
	  <input type="hidden" name="wallet_id" :value="wallet.id" v-model="walletid">
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
        	<option>₹</option>
      		</select>
    		</span>
  	</p>
 	 <p class="control">
    		<input class="input is-large" name="amount" type="text" placeholder="Amount of money" v-model="amount" v-on:keyup="quantitycalc" required>
	  	<input type="hidden" name="quantity" :value="quantity" v-model="quantity">
	  	<input type="hidden" name="commission" :value="commission" v-model="commission">
  	</p>
  	<p class="control">
		<button class="button is-primary is-large">Buy</button>
  	</p>
	</div>			

<div class="field ">
  <p class="control">
  <label class="is-large label">You are about to buy {{ quantity }} {{ coinname }} </label>
  </p>
</div>  
<div class="field has-addons">
  <p class="control">
      <a v-if="coinid == 1"class="button is-static">Commission %</a>
  </p>
  <p class="control">
  <input v-if="coinid == 1"class="input" name="compct" type="text"  v-model="compct" v-on:keyup="comchg" >
  </p>
  <p class="control">
  <a v-if="coinid == 1"class="button is-static">₹{{ cominr }}</a>
  </p>
  <p class="control">
      <a v-if="coinid == 1"class="button is-static">Transaction Fee %</a>
  </p>
  <p class="control">
  <input v-if="coinid == 1"class="input" name="txnpct" type="text" v-model="txnpct" v-on:keyup="txnchg" >
  </p>
  <p class="control">
  <a v-if="coinid == 1"class="button is-static">₹{{ txninr }}</a>
  </p>
  </div>
<div class="field">
  <p class="control">
  <label v-if="coinid == 1" class="is-large label">Unocoin would have given only {{ uquantity }} BTC at rate of ₹{{ urate }} </label>
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
	props : ["balance","data","urate"],
	    data : function() {
		return {
			btc : 0,
			eth : 0,
			xrp : 0,
			xlm : 0,
			walletid : "",
			quantity : "",
			amount : "",
			rate : "",
			coinid : 0,
			coinname : "",
			termsandc : false,
			commission : 0,
			uquantity : "",
			ucommission : "",
			compct : 1,
			txnpct : 5,
			cominr : 0 ,
			txninr : 0

		}
	    },
	    computed : {
		quantityValue : function() {
			return this.rate;
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
	comchg(){
			this.rate = +this.btc + +this.btc*0.01*this.compct ;	
			this.quantity = ((this.amount - this.commission) / this.rate).toFixed(8);
			this.cominr = ((this.amount)*(this.btc*0.01*this.compct)/this.rate).toFixed(2); 
	},
	txnchg(){
			this.commission = this.amount*0.01*this.txnpct ;	
			this.quantity = ((this.amount - this.commission) / this.rate).toFixed(8);
			this.txninr = this.commission ;

	},
		quantitycalc(){
			if(this.coinid == 1) this.rate = this.btc; 
			if(this.coinid == 2) this.rate = this.eth; 
			if(this.coinid == 3) this.rate = this.xrp; 
			if(this.coinid == 4) this.rate = this.xlm;

			this.commission = this.amount*0.01*this.txnpct ;	
			this.quantity = ((this.amount - this.commission) / this.rate).toFixed(8);
		
			this.ucommission = this.amount*0.01*1;	
			this.uquantity = ((this.amount - this.ucommission) / this.urate).toFixed(8); 

			this.comchg();
			this.txnchg();

		},
		walletselected(walletid){
			this.walletid = walletid;
			if(this.coinid == 1) {  this.rate = this.btc; this.coinname = "BTC"; }
			if(this.coinid == 2) { this.rate = this.eth; this.coinname = "ETH"; }
			if(this.coinid == 3) { this.rate = this.xrp; this.coinname = "XRP" ; }
			if(this.coinid == 4) { this.rate = this.xlm; this.coinname = "XLM" ; }
			
			this.commission = this.amount*0.01*this.txnpct ;	
			this.quantity = ((this.amount - this.commission) / this.rate).toFixed(8);
			
			this.ucommission = this.amount*0.01*1;	
			this.uquantity = ((this.amount - this.ucommission) / this.urate).toFixed(8); 
		
			this.comchg();
		        this.txnchg();
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

	//this.interval = setInterval(function () {
	//			          this.getValues();
	//				      }.bind(this), 30000); 
			    
		//this.getINR();

            console.log(this.data);
        }

    }

</script>
    
