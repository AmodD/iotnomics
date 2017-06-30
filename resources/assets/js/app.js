require('./bootstrap');

import example from './components/Example.vue' ;
import graph from './components/Graph.vue' ;


const app = new Vue({
    el: '#app',
    data : { 
   		showModal : false,
		dataObj : Object
    },
    props: ['name','code','labels','sell','buy'],
    components : { example , graph  }
});



