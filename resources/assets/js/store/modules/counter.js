const state = {
	counter:0
}

const getters = {
	getDoubleCounter: state => {
			return state.counter * 2;
	},
	getCounter: state=>{
		return state.counter;
	}
}

const mutations = {
	'INCREMENT' (state,payload) {
			state.counter += payload;
	},
	'DECREMENT' (state,payload) {
		state.counter -= payload;
	}

}

const actions = {
	increment : ({ commit },payload) => {
			commit('INCREMENT',payload);
	},
	decrement : ({ commit },payload) => {
		commit('DECREMENT',payload);
	}
}

export default  {
	state,
	getters,
	mutations,
	actions
}

