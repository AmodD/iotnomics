
<template>

	<div class="box">
		<nav class="level">

			<div class="level-item has-text-centered">
				<p><span :class="tagClass">{{ name }}</span></p>
			</div>
			<div class="level-item has-text-centered">
				<p v-if="!showcreate"><span class="is-large"><h1>{{ data.quantity }}  {{ code }}</h1></span></p>
			</div>	
			<div  v-if="!showcreate" class="level-item has-text-centered">
			</div>	
			<div  class="level-item has-text-centered">
				<p v-if="!showcreate"><strong> Wallet Id : </strong>{{ data.id }}</p>
			</div>	
			<div v-if="showcreate"  class="level-item has-text-centered"><form method="POST" action="/wallets">
				<slot name="csrf-field"></slot>
				<input name="coin_id" type="hidden" :value="coin_id"></input>
				<button class="button is-primary">Create {{ code }} Wallet</button>
			</form>
			</div>
		</nav>	

	</div>
</template>


<script>
    export default {

	props : ["data","name","showcreate","code","labels","coin_id"],
	data : function() {
		return {
			quantity : 12
		}
	},
	computed : {
		tagClass : function() {
			return 'tag ' + this.labels + " is-large";
		},
		balance : function() {
			if(this.data) return 0;
			else return "not created"
			
		}
	},
	mounted() {
//		console.log(this.data);
//		console.log(this.data['id']);
	}


    }
</script>

