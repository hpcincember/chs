<template>
	<div class="container">
		<div class="row">
            <div class="col-lg-12">
            	<div class="panel-group">
				  <div class="panel panel-success">
				  	<div class="panel-heading">
				  		<div class="btn-group pull-right">
				  			<input type="button" class="btn btn-primary btn-sm" value="Create" @click="showAddModal">
				  		</div>
					  		Cellgroups
			  		</div>
				    <div class="panel-body table-responsive ">
				    	<vuetable ref="vuetable"
						    api-url="http://127.0.0.1:8000/cellgroup-page-data"
						    :fields="fields"
						    pagination-path=""
						     @vuetable:pagination-data="onPaginationData"
						  >
						  	 <template slot="actions" slot-scope="props">
							  <div class="btn-group" role="group" aria-label="Basic example">
							    <button class="btn btn-primary btn-xs"
							      @click="onAction('view-item', props.rowData, props.rowIndex)">
							      V
							    </button>
							    <button class="btn btn-info btn-xs"
							      @click="onAction('edit-item', props.rowData, props.rowIndex)">
							      E
							    </button>
							    <button class="btn btn-danger btn-xs"
							      @click="onAction('delete-item', props.rowData, props.rowIndex)">
							      D
							    </button>
							  </div>
							  </template>
						  </vuetable>
						   <div class="vuetable-pagination ui basic segment grid">
						    <vuetable-pagination-info ref="paginationInfo"
						       ></vuetable-pagination-info>
						    <vuetable-pagination ref="pagination"  @vuetable-pagination:change-page="onChangePage"></vuetable-pagination>
						</div>
				    </div>
				   <process-modal @processDone="processDone"></process-modal>
				   <view-modal></view-modal>
				   <delete-modal @processDone="processDone"></delete-modal>
				  </div>
				</div>
            </div>
        </div>
	</div>
</template>

<script>
import Vuetable from 'vuetable-2/src/components/Vuetable'
import VuetablePagination from 'vuetable-2/src/components/VuetablePaginationDropdown'
import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'
import ProcessModal from './Process'
import ViewModal from './View'
import DeleteModal from './Delete'
	export default {
		components:{
	   		Vuetable,
    		VuetablePagination,
    		VuetablePaginationInfo,
    		ProcessModal,
    		ViewModal,
    		DeleteModal
		},
		data(){
			return{
				fields:[
					{ name:'cellgroup_id',title:'ID'},
					{ name:'cellgroup',title:'Cell Group'},
					{ name:'network',title:'Network'},
					{ name:'mother_cell_group',title:'Mother Cell Group'},
					{ name:'full_name',title:'Leader'},
					{ 
			              name: '__slot:actions',   // <----
			              title: 'Actions',
			              titleClass: 'center aligned',
			              dataClass: 'center aligned'
			        }

				]

			}
		},
		methods:{
			onPaginationData (paginationData) {
           		this.$refs.pagination.setPaginationData(paginationData)
       			this.$refs.paginationInfo.setPaginationData(paginationData)  
		     },
		    onChangePage (page) {
		       this.$refs.vuetable.changePage(page)
		     },
			onAction(action,data,index){
				if(action == "view-item") {
					this.showView(data)
				} else if(action == "edit-item"){
					this.$store.dispatch("clearNetworkError")
					this.editView(data)
				} else if (action == 'delete-item') {
					this.deleteView(data)
				}

			},
			deleteView(data){
				this.$emit("deleteView",data)
				then(() => {
					this.$refs.vuetable.reload();
     				this.$refs.deleteLeader.close();
				})
				.catch(error=> {
					console.log(error)
				})
			},
			editView(data){
				this.$emit("modal",data)
				this.$store.dispatch("setMethod",false)
				this.$store.dispatch("clearNetworkError")
				this.$store.dispatch("getBelongsToNetwork",data.network_id)
			},
			showAddModal(data){
				data={}
				this.$emit("modal",data)
				this.$store.dispatch("setMethod",true)
			},
			showView(data){
				this.$emit("modalView",data);
			},
			processDone(){
				this.$refs.vuetable.reload();
			}
		}
	}
</script>