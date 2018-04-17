const state = {
	sundays:[],
	leaderAttendance:[],
	pagination:[]

}

const getters = {
	getSundaysPerMonth(){
		return state.sundays
	},
	getLeadersAttendance(){
		return state.leaderAttendance
	},
	getPagination(){
		return state.pagination
	}
}
const mutations = {
	SET_SUNDAYS(state,sundays){
		state.sundays = sundays
	},
	SET_LEADERS_ATTENDANCE(state,leaderAttendance){
		state.leaderAttendance = leaderAttendance
	},
	SET_PAGINATION(state,pagination){
		state.pagination = pagination
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
	getLeadersAttendance({commit},url){
		axios.get(url).
		then(response => {
			commit('SET_LEADERS_ATTENDANCE',response.data.data)
			commit('SET_PAGINATION',response.data)
		})
		.catch(error => {
			console.log(error.response.data);
		})
	},
	searchLeadersAttendance({commit},keywords){
		axios.get('/attendance-search', { params: { keywords:keywords } })
        .then(response => {
			commit('SET_LEADERS_ATTENDANCE',response.data.data)
			commit('SET_PAGINATION',response.data)
		})
		.catch(error => {
			console.log(error.response.data);
		})
	},
	searchLeadersAttendanceByNetwork({commit},keywords){
		axios.get('/attendance-searchByNetwork', { params: { keywords:keywords } })
        .then(response => {
			commit('SET_LEADERS_ATTENDANCE',response.data.data)
			commit('SET_PAGINATION',response.data)
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