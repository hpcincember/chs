<template>
		<div>
			<div class="form-group col-lg-6">
				<input type="date" class="form-control">
			</div>
			<div class="form-group col-lg-6">
				<select class="form-control" v-model="selectedNetwork">
					<option :value="network.id" v-for="network in networks">{{network.name}}</option>
				</select>
			</div>
			<br>
			<div class="form-group">
				<div class="checkbox" v-if="leadersBelongsToNetwork.length > 0">
					<input type="button" value="Check" class="btn btn-primary btn-sm"><br>
					<template  v-for="leader in leadersBelongsToNetwork" >
						<label><input type="checkbox" :value="leader.id" v-model="attendance">{{leader.first_name}} {{leader.last_name}}</label><br>
					</template>
				</div>
			</div>
		</div>
</template>

<script>
	import {mapGetters} from 'vuex'
	export default {
		data(){
			return{
				selectedNetwork:'',
				attendance:[]
			}
		},
		watch:{
			selectedNetwork(after,before){
				this.getBelongsToNetwork();
			}
		},
		computed:{
			...mapGetters({
				networks:'getNetworks',
				leadersBelongsToNetwork:'getLeadersBelongstoNetwork'
			})

		},
		created(){
			this.$parent.$on("modal",this.showModal)
			this.$store.dispatch("setNetwork");
		},
		methods:{
			showModal(){
				this.$refs.modal.open()
			},
			getBelongsToNetwork(){
				this.$store.dispatch("searchLeadersAttendanceByNetwork",this.selectedNetwork);
			},
			checkUncheckAll(){
				if(this.attendance > 0) {
					this.attendance = []
				}
			}
		}
	}
	
</script>