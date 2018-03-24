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
					  		Leaders
			  		</div>
				    <div class="panel-body table-responsive">
				    	<vuetable ref="vuetable"
						    api-url="http://127.0.0.1:8000/leaders-page-data"
						    :fields="fields"
						    :sort-order="sortOrder"
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
							      @click="onAction('edit-item', props.rowData, props.rowIndex),$v.leaders.$reset()">
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
				  </div>
				</div>
            </div>
        </div>
		<sweet-modal ref="modal" title="Leader's Information" overlay-theme="dark" modal-theme="dark">
			  <table class="table table-bordered">
			   <tbody>

			      <tr>  
			      		<td>Name</td>
			            <td>
							{{ leaders.first_name }}  {{ leaders.middle_name }} {{ leaders.last_name }} {{ leaders.suffix }}	
			            </td>
				  </tr>
				  <tr>
				  		<td>Gender</td>
				   		<td>
							Gender: {{ leaders.gender }}
				   		</td>
				  </tr>		            
			  	  <tr>
			  	  		<td>School</td>
				   		<td>
							School: {{ leaders.school }}
						</td>
			   	   </tr>
			   	   <tr>
			   	   		<td>Work</td>
						<td>
							Work Place: {{ leaders.work_place }}
						</td>
			   	   </tr>
			   	   <tr>
			   	   		<td>Contact Number</td>
						<td>
							{{ leaders.contact_number }}
						</td>
			   	   </tr>
			   	   <tr>
			   	   		<td>Facebook Account</td>
						<td>
							{{ leaders.fb_account }}
						</td>
			   	   </tr>
			   	   <tr>
			   	   		<td>Email Address</td>
						<td>
							{{ leaders.email_address}}
						</td>
			   	   </tr>
			   	   <tr>
			   	   		<td>Level</td>
						<td>
							{{ formatLevel(leaders.level) }}
						</td>	
			   	   </tr>
			   	   <tr>
			   	   		<td>Network</td>
						<td>
							{{ leaders.network }}
						</td>	
			   	   </tr>
			   	   <tr>
			   	   		<td>CellGroup</td>
						<td>
							{{ leaders.cell_group }}
						</td>				
			   	   </tr>
			   	   <tr>
			   	   		<td>Birthdate</td>
				  	 	<td>
							{{ leaders.birthdate}}
						</td>
			   	   </tr>
			   	   <tr>
			   	   		<td>First Attend</td>
						<td>
							{{ leaders.first_attend }}
						</td>
			   	   </tr>
				  </tr>
			   </tbody>
			  </table>
		</sweet-modal>

		<sweet-modal ref="modalLeader" title="Leader's Information" width="50%" overlay-theme="dark" modal-theme="dark">
			 <table class="table">
			   <tbody>
			      <tr>  
			            <td>
							<div class="form-group" :class="{invalid:$v.leaders.first_name.$error}">
								<label>First Name</label>
								<input type="text" name="" class="form-control" v-model="leaders.first_name" placeholder="First Name" @blur="$v.leaders.first_name.$touch()">
							</div>
			            </td>
			            <td>
							<div class="form-group" :class="{invalid:$v.leaders.middle_name.$error}">
								<label>Middle Name</label>
								<input type="text" name="" class="form-control" v-model="leaders.middle_name" placeholder="Middle Name" @blur="$v.leaders.middle_name.$touch()">
							</div>
			            </td>
			            <td>
							<div class="form-group" :class="{invalid:$v.leaders.last_name.$error}">
								<label>Last Name</label>
								<input type="text" name="" class="form-control" v-model="leaders.last_name" placeholder="Last Name" @blur="$v.leaders.last_name.$touch()">
							</div>
			            </td>
				   </tr>
				   <tr>
				   		<td>
							<div class="form-group">
								<label>Suffix</label>
								<input type="text" name="" class="form-control" v-model="leaders.suffix" placeholder="Suffix">
							</div>
				   			
				   		</td>

				   		<td>
							<div class="form-group">
								<label>Gender</label>
								<select class="form-control" v-model="leaders.gender">
									<option :value="key" v-for="(gender,key) in genders">{{ gender }}</option>
								</select>
							</div>
				   		</td>
					</tr>

					<tr>
						<td colspan="2">
							<div class="form-group">
								<label>School</label>
								<input type="text" name="" class="form-control" v-model="leaders.school" placeholder="School">
							</div>
						</td>

						<td>
							<div class="form-group">
								<label>Work Place</label>
								<input type="text" name="" class="form-control" v-model="leaders.work_place" placeholder="Work Place">
							</div>
						</td>
					</tr>

					<tr>
						<td>
							<div class="form-group">
								<label>Contact Number</label>
								<input type="number" name="" class="form-control" v-model="leaders.contact_number" placeholder="Contact Number">
							</div>
						</td>

						<td>
							<div class="form-group">
								<label>Facebook Account</label>
								<input type="text" name="" class="form-control" v-model="leaders.fb_account" placeholder="Facebook Account">
							</div>
						</td>

						<td>
							<div class="form-group" :class="{invalid:$v.leaders.email_address.$error}">
								<label>Email Address</label>
								<input type="text" name="" class="form-control" @blur="$v.leaders.email_address.$touch()" v-model="leaders.email_address" placeholder="Email" >
							</div>
						</td>

					</tr>
					<tr>
						<td>
							<div class="form-group" :class="{invalid:$v.leaders.level.$error}">
								<label>Levels</label>
								<select class="form-control" v-model="leaders.level" @change="$v.leaders.level.$touch()">
									<option :value="key" v-for="(level,key) in levels">{{ level }}</option>
								</select>
							</div>
						</td>	

						<td>
							<div class="form-group" :class="{invalid:$v.leaders.network.$error}">
								<label>Network</label>
								<select class="form-control" v-model="leaders.network" @change="$v.leaders.network.$touch()">
									<option :value="network.id" v-for="(network,key) in networks">{{ network.name }}</option>
								</select>
							</div>
						</td>	

						<td>
							<div class="form-group">
								<label>Cell Group</label>
								<select class="form-control" v-model="leaders.cell_group">
									<option :value="cellgroup.id" v-for="(cellgroup,key) in cellgroups">{{ cellgroup.name }}</option>
								</select>
							</div>
						</td>				
				  </tr>
				  <tr>
				  	 	<td>
							<div class="form-group">
								<label>Birthdate</label>
								<input type="date" name="" class="form-control" v-model="leaders.birth_date" placeholder="Birthdate">
							</div>
						</td>

						<td>
							<div class="form-group">
								<label>First Attend</label>
								<input type="date" name="" class="form-control" v-model="leaders.first_attend" placeholder="First Attend">
							</div>
						</td>
				  </tr>
						<div class="form-group">
							<div v-if="isAdd">
								<button class="btn btn-primary" @click="addLeader">Add</button>
							</div>
							<div v-else>
								<button class="btn btn-primary" @click="updateLeader">Update</button>
							</div>
						</div>
			   </tbody>
			  </table>
		</sweet-modal>

		<sweet-modal icon="warning" ref="deleteLeader">
			Are you sure you want to delete this item?
			<br>
			<div class="pull-right">
				<button class="btn btn-primary" @click="deleteLeader">Yes</button>
				<button class="btn btn-default" @click="deleteModalClose">Cancel</button>
			</div>
		</sweet-modal>

		
    </div>
 	
</template>

<script>
import Vuetable from 'vuetable-2/src/components/Vuetable'
import VuetablePagination from 'vuetable-2/src/components/VuetablePaginationDropdown'
import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'
import {required,email} from 'vuelidate/lib/validators'
import {mapGetters,mapActions} from "vuex"
export default {
  components: {
    Vuetable,
    VuetablePagination,
    VuetablePaginationInfo,
  },
  data(){
  	return{
      sortOrder: [
      {
        field: 'last_name',
        sortField:'last_name',
        direction: 'asc'
      }
      ],
  		fields: [
        { name:'id',sortField:'id',title:'Id'},
        { 
          name:'first_name',
          sortField: 'first_name',
          title:'First Name'
        },
        { name:'middle_name',title:'Middle Name'},
        { name:'last_name',title:'Last Name'},
        { name:'suffix',title:'Suffix'},
        { name:'gender',title:'Gender',callback:'formatGender'},
        { name:'school',title:'School'},
        // { name:'work_place',title:'Work Place'},
        // { name:'contact_number',title:'Contact Number'},
        // { name:'fb_account',title:'Facebook Account'},
        // { name:'email_address',title:'Email Address'},
        { name:'level',title:'Level',callback:'formatLevel'},
        { name:'network',title:'Network'},
        { name:'cell_group',title:'Cell Group'},
        { name:'birth_date',title:'Birth date'},
  			{ name:'first_attend',title:'First Attend'},
        { 
              name: '__slot:actions',   // <----
              title: 'Actions',
              titleClass: 'center aligned',
              dataClass: 'center aligned'
        }
  		],
      items:[],
      isAdd:"",
      leaders: {
        id : '',
        first_name: '',  
        middle_name: '',
        last_name: '',
        suffix: '',
        gender: '',
        school: '',
        work_place: '', 
        contact_number:'',
        fb_account:'',
        email_address:'',
        level:'',
        network :'',
        cell_group:'',
        birth_date   :'',
        first_attend:'',
        created_at:'',
        updated_at:'',
      },
      email:''
  	}
  },
  validations:{
  	leaders : {
  		first_name: {
  			required
  		},
  		middle_name: {
  			required
  		},
  		last_name: {
  			required
  		},
  		gender: {
  			required
  		},
	  	email_address: {
	  	  	email
	  	},
	  	level:{
	  		required
	  	},
	  	network:{
			required
	  	},
	  	cell_group:{
	  		required
	  	},
	  	birth_date: {
	  		required
	  	},
	  	first_attend: {
	  		required
	  	}
  	}
  },
  computed:{
  	...mapGetters({
  		levels:'getLevels',genders:'getGenders',networks:'getNetworks',cellgroups:'getCellGroups'
  	})
  	
  },
  created(){
  	this.$store.dispatch("setNetwork");
  	this.$store.dispatch("setCellGroups");
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
           this.viewItem(data);
        } else if(action == "edit-item") {
           this.editItem(data);
        } else if(action == "delete-item") {
        	this.leaders = data;
        	this.$refs.deleteLeader.open()
        }

     },
     viewItem(data){
      this.leaders = data;
      this.$refs.modal.open();
     },
     editItem(data){
      this.leaders = data;
	  this.isAdd = false;      
      this.$refs.modalLeader.open();
     },
     formatGender(gender){
       return (gender == 1) ? 'Male' : 'Female'
     },
     formatLevel(level){
       var displayLevel = "";
        switch (level) {
            case 0:
                displayLevel = "Pastor/Pastor's Wife";
                break;
            case 1:
                displayLevel = "P12";
                break;
            case 2:
                displayLevel = "144";
                break;
            case 3:
                displayLevel = "1728";
                break;
            case 4:
                displayLevel = "20,000";
                break;
            default:
                displayLevel = "Invalid Level";
        }
        return displayLevel;
     },
     updateLeader(){
     	this.$store.dispatch("updateLeader",this.$data.leaders)
     	.then(response => {
            this.$refs.vuetable.reload();
            this.$refs.modalLeader.close();
        }, error => {
        })
     },
     addLeader(){
     	this.$store.dispatch("addLeader",this.$data.leaders)
     	.then(response => {
     		this.$refs.vuetable.reload();
     		this.$refs.modalLeader.close();
     	},error => {

     	})
     },
     showAddModal(){
     	this.isAdd = true
     	this.$refs.modalLeader.open()
     },
     deleteLeader(){
     	this.$store.dispatch("deleteLeader",this.leaders)
     	.then((response => {
     		this.$refs.vuetable.reload();
     		this.$refs.deleteLeader.close();
     	}))
     	.catch((error => console.log(error)))
     },
     deleteModalClose(){
     	this.$refs.deleteLeader.close();
     }
  }
}

</script>

<style type="text/css">
	.form-group.invalid input {
		border : 1px solid red;
		background-color : #ffc9aa;
	}
	.form-group.invalid label {
		color :red;
	}
</style>