require('./bootstrap');

import example from './components/Example.vue' ;



const app = new Vue({
    el: '#app',
    data : { 
   		showModal : false,
		dataObj : Object
    },
    props: ['name','code'],
    components : { example  }
});
