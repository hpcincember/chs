import Vue from "vue"
import Vuex from "vuex"
import counter from './modules/counter';
import general from './modules/general';
import network from './modules/network';
import leader from './modules/leader';
import * as actions from './action'
Vue.use(Vuex)

export const store = new Vuex.Store({
	actions,
	modules:{
	   counter,
	   general,
	   network,
	   leader	
	}
}); 