<template>
	<canvas id="graph" width="200" height="200">
	</canvas>	
</template>

<script>
    export default {
	    props : ['labels','sell','buy'],
	    data : function() {
		return {
			inr : "",
			interval : null
		}
	    },
        mounted() {


var ctx = document.getElementById("graph");
var myChart = new Chart(ctx, {
	type: 'line',
	data: {
		labels: this.labels,
		datasets: [
			{
			label: 'Sell Values',
			data: this.sell,
			backgroundColor: [
				'rgba(255, 99, 132, 0.2)',
				'rgba(255, 159, 64, 0.2)'],
			borderColor: [
				'rgba(255,99,132,1)',
				'rgba(255, 159, 64, 1)'],
			borderWidth: 1
			},
			{
			label: 'Buy Values',
			data: this.buy,
			backgroundColor: [
				'rgba(54, 162, 235, 0.2)',
				'rgba(255, 159, 64, 0.2)'],
			borderColor: [
				'rgba(54, 162, 235, 1)',
				'rgba(255, 159, 64, 1)'],
			borderWidth: 1
			}
		
			]
		}
	});



		console.log('Component mounted . Lables - '+this.labels)
        }
    }
</script>
