const state =  {
	leaders:[],
	errors:{}
}

const getters = {
	getLeaders(){
		return state.leaders;
	},
	getErrors(){
		return state.errors;
	}
}

const mutations = {
	SET_LEADERS(state,leaders){
		state.leaders = leaders;
	},
	UPDATE_LEADERS(state,leaders){
		state.leaders = leaders;
	},
	SET_ERRORS(state,errors){
		state.errors = errors;
	},
	CLEAR_ERROR(state){
		state.errors = {};
	}
}

const actions = {
	setLeaders({commit}) {
		axios.get("/leaders-data")
		.then((response => {
			commit("SET_LEADERS",response.data)
		}))
		.catch((error => console.log(error)))
	},
	updateLeader({commit},leader){
		axios.patch("/leader/"+ leader.id,leader)
		.then((response => {
			console.log(response)
		}))
		.catch((error => commit("SET_ERRORS",error.response.data)))
	},
	addLeader({commit},leader){
		console.log(leader.first_name)
		axios.post("/leader",leader)
		.then((response => {
			console.log(response)
		}))
		.catch((error => commit("SET_ERRORS",error.response.data)))
	},
	deleteLeader({commit},leader){
		axios.delete("/leader/"+ leader.id)
		.then((response => {
			console.log(response)
		}))
		.catch((error => console.log(error)))
	},
	clearErrors({commit}){
		commit("CLEAR_ERROR");
	}
}

export default {
	state,
	getters,
	mutations,
	actions
}