require('./bootstrap');

import errors from './components/Errors.vue' ;
import example from './components/Example.vue' ;
import graph from './components/Graph.vue' ;
import stats from './components/Stats.vue' ;
import buy from './components/Buy.vue' ;
import sell from './components/Sell.vue' ;
import wallet from './components/Wallet.vue' ;


const app = new Vue({
    el: '#app',
    data : { 
   		showModal : false,
		dataObj : Object
    },
    props: ['errors','data','name','code','labels','sell','buy','balance','coin_id','showcreate' , 'showmkt','margins','urate'],
    components : { errors , example , graph , stats , buy , wallet , sell  }
});



