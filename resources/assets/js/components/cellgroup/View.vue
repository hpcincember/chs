<template>
	<sweet-modal ref="modal" title="" overlay-theme="dark" modal-theme="dark">
		<table class="table table-bordered">	
			<tbody>	
				<tr v-for="(item,key) in items">	
					<td><strong>{{formatName(key)}}</strong></td>
					<td>{{item}}</td>
				</tr>
			</tbody>
		</table>
			 
	</sweet-modal>
</template>

<script>
	export default{
		data(){
			return{
				items:[]
			}
		},
		created(){
			this.$parent.$on("modalView",this.showModal)

		},
		methods:{
			showModal(value){
				this.items = value
				this.$refs.modal.open();
			},
			formatName(value){
				var displayValue = ""
				if(value === "id") {
					displayValue = "ID"
				} else if (value === "cellgroup") {
					displayValue = "Cell Group"
				} else if (value === "network") {
					displayValue = "Network"
				} else if (value === "mother_cell_group") {
					displayValue = "Mother Cell Group"
				} else if (value === "full_name") {
					displayValue = "Full Name"
				}
				return displayValue
			}
		}

	}
</script>