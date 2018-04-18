<template>
	<sweet-modal ref="modal" title="" overlay-theme="dark" modal-theme="dark" width="80%">
		<div class="form-group col-lg-6">
			<input type="date" class="form-control">
		</div>
		<div class="form-group col-lg-6">
			<select class="form-control">
				<option :value="network.id" v-for="network in networks">{{network.name}}</option>
			</select>
		</div>
	</sweet-modal>
</template>

<script>
	import {mapGetters} from 'vuex'
	export default {
		mounted(){
			
		},
		computed:{
			...mapGetters({
				networks:'getNetworks'
			})

		},
		created(){
			this.$parent.$on("modal",this.showModal)
			this.$store.dispatch("setNetwork");
		},
		methods:{
			showModal(){
				this.$refs.modal.open()
			}
		}
	}
	
</script>