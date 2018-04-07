const state = {
	sundays:[],
	leaderAttendance:[]

}

const getters = {
	getSundaysPerMonth(){
		return state.sundays
	},
	getLeadersAttendance(){
		return state.leaderAttendance
	}
}
const mutations = {
	SET_SUNDAYS(state,sundays){
		state.sundays = sundays
	},
	SET_LEADERS_ATTENDANCE(state,leaderAttendance){
		state.leaderAttendance = leaderAttendance
	}
}
const actions = {
	getSundaysPerMonth({commit}){
		axios.get('/attendance-sundays')
		.then(response => {
			commit("SET_SUNDAYS",response.data)
		})
		.catch(error => {
			console.log(error)
		})
	},
	getLeadersAttendance({commit}){
		axios.get('/attendance-leaders').
		then(response => {
			commit('SET_LEADERS_ATTENDANCE',response.data)
		})
		.catch(error => {
			console.log(error.response.data);
		})
	}
}

export default {
	state,
	getters,
	mutations,
	actions
}