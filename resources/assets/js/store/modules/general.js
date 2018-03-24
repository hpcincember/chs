const state = {
	genders: {0:"Female",1:"Male"},
	levels:{0:"Pastor/Pastor's Wife",1:"P12",2:"144",3:"1728",4:"20,000"}
}

const getters = {
	getGenders: state => {
		return state.genders;
	},
	getLevels: state=>{
		return state.levels;
	}

}

const mutations = {
	
}

const actions = {

}

export default {
	state,
	getters,
	mutations,
	actions,
}