<template>
	<sweet-modal icon="warning" ref="deleteView" modal-theme="dark" overlay-theme="dark">
			Are you sure you want to deactivate this Cellgroup?
			<br>
			<div class="pull-right">
				<button class="btn btn-primary" @click="deleteItem">Yes</button>
				<button class="btn btn-default" @click="closeModal">Cancel</button>
			</div>
		</sweet-modal>
</template>

<script>
	export default{
		data(){
			return{
				id:""
			}
		},
		created(){
			this.$parent.$on("deleteView",this.showModal)
		},
		methods:{
			showModal(data){
				this.id = data.cellgroup_id
				this.$refs.deleteView.open();
			},
			closeModal(){
				this.$refs.deleteView.close();
			},
			deleteItem(){
				this.$store.dispatch("deleteCellgroup",this.id)
				.then(response => {
					this.$emit("processDone")
					this.$refs.deleteView.close()
				})
				.catch(error => {
					console("Error occurs")
				})
			}

		}
	}
	
</script>