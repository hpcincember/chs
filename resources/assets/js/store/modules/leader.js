const state =  {
	leaders:[]
}

const getters = {
	getLeaders(){
		return state.leaders;
	}
}

const mutations = {
	SET_LEADERS(state,leaders){
		state.leaders = leaders;
	},
	UPDATE_LEADERS(state,leaders){
		state.leaders = leaders;
	},
}

const actions = {
	setLeaders({commit}) {
		axios.get("/leaders-data")
		then((response => {
			commit("SET_LEADERS",response.data)
		}))
		.catch((error => console.log(error)))
	},
	updateLeader({commit},leader){
		axios.patch("/leader/"+ leader.id,leader)
		.then((response => {
			console.log(response)
		}))
		.catch((error => console.log(error)))
	},
	addLeader({commit},leader){
		axios.post("/leader",leader)
		.then((response => {
			console.log(response)
		}))
		.catch((error => console.log(error)))
	},
	deleteLeader({commit},leader){
		axios.delete("/leader/"+ leader.id)
		.then((response => {
			console.log(response)
		}))
		.catch((error => console.log(error)))
	}
}

export default {
	state,
	getters,
	mutations,
	actions
}