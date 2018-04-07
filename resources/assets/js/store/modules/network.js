const state = {
	networks: [],
	cellgroups:[],
	motherCellGroups:[],
	errors:{},
	isCreate:true
}

const getters = {
	getNetworks(){
		return state.networks;
	},
	getCellGroups(){
		return state.cellgroups;
	},
	getMotherCellGroups(){
		return state.motherCellGroups;
	},
	getNetWorkErrors(){
		return state.errors;
	},
	getMethod(){
		return state.isCreate;
	}

}

const mutations = {
	SET_NETWORK(state,networks){
		state.networks = networks;
	},
	SET_CELLGROUPS(state,cellgroups){
		state.cellgroups = cellgroups
	},
	SET_MOTHER_CELLGROUPS(sate,cellgroups){
		state.motherCellGroups = cellgroups
	},
	SET_ERRORS(state,errors){
		state.errors = errors	
	},
	CLEAR_ERROR(){
		state.errors = {}
	},
	SET_METHOD(state,method){
		state.isCreate = method
	}
}

const actions = {
	setNetwork : ({commit}) => {
		axios.get("/networks")
		.then((response =>{
			commit("SET_NETWORK",response.data)
		}))
		.catch((error => {
			commit("SET_ERRORS",error.response.data)
		}))
	},
	setCellGroups : ({commit}) => {
		axios.get("/cellgroup-data")
		.then((response =>{
			commit("SET_CELLGROUPS",response.data)
		}))
		.catch((error => {
			commit("SET_ERRORS",error.response.data)
		}))
	},
	addCellGroup({commit},cellgroup){
		axios.post('/cellgroup',cellgroup)
		.then(response => {
			swal(
            'Inserted!',
            'New Cellgroup was inserted.',
            'success'
            )
		})
		.catch(error => {
			commit("SET_ERRORS",error.response.data)
		})
	},
	updateCellgroup({commit},cellgroup) {
		axios.patch("/cellgroup/"+cellgroup.cellgroup_id,cellgroup)
		.then((response => {
			console.log(response)
		}))
		.catch((error => {
			commit("SET_ERRORS",error.response.data)
		}))
	},
	deleteCellgroup({commit},id){
		axios.delete('/cellgroup/'+id)
		.then(response => {
			swal(
            'Deleted!',
            'New Cellgroup was deleted.',
            'success'
            )
		})
		.catch(error => {
			console.log(error.response.data);
		})
	},
	getBelongsToNetwork({commit},id){
		axios.get('/cellgroup/belongs-to-network/'+id)
		.then((response => {
			commit("SET_MOTHER_CELLGROUPS",response.data)
		}))
		.catch((error => console.log(error)))
	},
	clearNetworkError({commit}){
		commit("CLEAR_ERROR");
	},
	setMethod({commit},method){
		commit("SET_METHOD",method)
	}
}

export default {
	state,
	getters,
	mutations,
	actions
}
