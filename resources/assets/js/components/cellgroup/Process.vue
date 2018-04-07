<template>
	<sweet-modal ref="modal" title="" overlay-theme="dark" modal-theme="dark">
	  <table class="table">	
			<tbody>	
				<tr>
					<td>Network</td>
					<td>	
					   <div class="form-group">
							<select class="form-control" v-model="form.network_id" @change="changeNetwork">
								<option :value="network.id" v-for="(network,key) in networks">{{ network.name }}</option>
							</select>
							<span class="text-danger">{{ getErrorByKey("network_id")}}</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Mother Cell Group</td>
					<td>
						<div class="form-group">
							<select class="form-control" v-model="form.mother_cell_group_id">
								<option :value="cellgroup.id" v-for="(cellgroup,key) in motherCellGroups">{{ cellgroup.name }}</option>
							</select>
							<span class="text-danger">{{ getErrorByKey("mother_cell_group_id")}}</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Cell Group</td>	
					<td>
						<div class="form-group">
							<input type="text" name="" class="form-control	" v-model="form.cellgroup">
							<span class="text-danger">{{ getErrorByKey("cellgroup")}}</span>
						</div>
					</td>
				</tr>
				<tr>
					<td>Leader</td>
					<td>	
					 	<div class="form-group">
							<select class="form-control" v-model="form.leader_id">
								<option :value="leader.id" v-for="(leader,key) in leaders">{{ leader.first_name }} {{ leader.middle_name}} {{ leader.last_name}}</option>
							</select>
							<span class="text-danger">{{ getErrorByKey("leader_id")}}</span>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">	
					 	<div class="form-group">
					 		<div v-if="isCreate">
								<input type="button" name="" value="submit" class="btn btn-primary pull-right" @click="submit">
					 		</div>
					 		<div v-else>
					 			<input type="button" name="" value="update" class="btn btn-primary pull-right" @click="update">
					 		</div>
					 	</div>
					</td>
				</tr>
			</tbody>
		</table>
	</sweet-modal>
</template>

<script>
	import {mapGetters} from 'vuex'
	export default{
		data(){
			return{
				items:[],
				form: {
					'id':'',
					'cellgroup':'',
					'cellgroups_id':'',
					'network':'',
					'network_id':'',
					'mother_cell_group':'',
					'mother_cell_group_id':'',
					'leader':'',
					'leader_id':''

				}
			}
		},
		computed:{
			...mapGetters({
				cellgroups:'getCellGroups',
				networks:'getNetworks',
				leaders:'getLeaders',
				errors:'getNetWorkErrors',
				motherCellGroups:'getMotherCellGroups',
				isCreate:'getMethod'

			}),
			hasWarning(){
				if(this.isCreate || 
				  ((!this.isCreate && this.hasUnderCellGroup) )) {
					return false
				} 
				return true
			},
			hasUnderCellGroup(){
		    	return this.motherCellGroups.length <= 0
		    }

		},
		created(){
			this.$store.dispatch('setNetwork')
			this.$store.dispatch('setCellGroups')
			this.$store.dispatch('setLeaders')
			this.$parent.$on("modal",this.showModal)
		},
		methods:{
			showModal(value){
				this.clearError();
				this.form = value
				this.$refs.modal.open();
			},
			submit(){
				this.$store.dispatch("addCellGroup",this.form)
				.then(response => {
					this.$refs.modal.close();
					this.$emit("processDone")
				})

			},
			update(){
				this.$store.dispatch('updateCellgroup',this.form)
				.then(response => {
					this.$refs.modal.close();
					this.$emit("processDone")
				})

			},
		    getErrorByKey(field){
		     	if(this.errors[field]) {
		     		return this.errors[field][0]
		     	}
		    },
		    changeNetwork(){
		    	this.$store.dispatch("getBelongsToNetwork",this.form.network_id)

		    },
		    clearError(){
		    	this.$store.dispatch("clearNetworkError");
		    },
		    
		}

	}
</script>