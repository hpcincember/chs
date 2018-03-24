const state = {
	networks: [],
	cellgroups:[]
}

const getters = {
	getNetworks(){
		return state.networks;
	},
	getCellGroups(){
		return state.cellgroups;
	}

}

const mutations = {
	"SET_NETWORK"(state,networks){
		state.networks = networks;
	},
	"SET_CELLGROUPS"(state,cellgroups){
		state.cellgroups = cellgroups
	}
}

const actions = {
	setNetwork : ({commit}) => {
		axios.get("/networks")
		.then((response =>{
			commit("SET_NETWORK",response.data)
		}))
		.catch((error => console.log(error)))
	},
	setCellGroups : ({commit}) => {
		axios.get("/cellgroups")
		.then((response =>{
			commit("SET_CELLGROUPS",response.data)
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
