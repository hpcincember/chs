<template>
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">
                 <div class="btn-group pull-right">
                    <a href="#" class="btn btn-primary btn-sm" @click="openModal">Create</a>
                </div>
                Roles
               </div>
               <div class="panel-body">
                  <div>
                     <vuetable ref="vuetable"
                        api-url="http://127.0.0.1:8000/roles-data"
                        :fields="fields"
                        pagination-path=""
                        @vuetable:pagination-data="onPaginationData"
                        @CustomAction:action-item="onActions"
                        >
                        </vuetable>
                     <div class="vuetable-pagination ui basic segment grid">
                        <vuetable-pagination-info ref="paginationInfo"
                           ></vuetable-pagination-info>
                        <vuetable-pagination ref="pagination"  @vuetable-pagination:change-page="onChangePage"></vuetable-pagination>
                     </div>
                  </div>
               </div>
                  <!-- add modal -->
                    <div id="wrapper" class="container"> 
                       <modal v-if="showModal"> 
                        <h3 slot="header" class="modal-title">
                            Create New Role
                        </h3>
                        <div slot="body">
                            <div class="form-group">
                                <label for="">Modules</label>
                                 <select name="" id="" class="form-control" v-model="module_id"> 
                                    <option :value="role.id" v-for="role in modules">{{ role.name }}</option>
                                </select>
                            </div>
                             <div class="form-group">
                                    <label for="role">Role</label>
                                    <input type="text" name="" class="form-control" placeholder="Role" v-model="role">
                            </div>
                             <div class="form-group">
                                <label for="">User ID</label>
                                <select name="" id="" class="form-control" v-model="user_id">
                                    <option :value="user.id" v-for="user in users"> {{ user.id }} - {{ user.first_name }} {{ user.last_name }}</option>
                                </select>
                            </div>
                          
                        </div>
                          
                        <div slot="footer">
                         <button type="button" class="btn btn-outline-info" @click="closeModal()"> Close </button>
                         <button type="button" class="btn btn-primary" data-dismiss="modal" @click="createRole()">
                           Submit
                         </button>
                        </div>
                      </modal>
                    </div>  
                  <!-- add end modal -->
            </div>
         </div>
      </div>
   </div>
</template>
<script>
   import Vuetable from 'vuetable-2/src/components/Vuetable'
   import VuetablePagination from 'vuetable-2/src/components/VuetablePaginationDropdown'
   //import VuetablePagination from 'vuetable-2/src/components/VuetablePagination'
   import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'
   import Vue from 'vue'
   import CustomActions from './CustomActions'
   import Modal from './Modal'
   import Service from './Service'
   
   Vue.component('custom-actions', CustomActions)
   export default {
     components: {
       Vuetable,
       VuetablePagination,
       VuetablePaginationInfo,
       Modal,
       Service
     },
     data() {
        return {
         showModal: false,
         module_id: '',
         user_id: '',
         role: '',
         fields: [
           {
             name: 'id',
             title: 'Id'
           },
           {
             name: 'module',
             title: 'Module'
           },
           {
             name: 'operation',
             title: 'operation'
           },
           {
             name: 'user_id',
             title: 'User ID'
           },
            {
              name: '__component:custom-actions',   // <----
              title: 'Actions',
              titleClass: 'center aligned',
              dataClass: 'center aligned'
            }
         ],
         users: [],
         modules: []
       }
    
     },
     mounted(){
        this.getModules();
        this.getUsers();
     },
      methods: {
         onPaginationData (paginationData) {
           this.$refs.pagination.setPaginationData(paginationData)
           this.$refs.paginationInfo.setPaginationData(paginationData)  
         },
         onChangePage (page) {
           this.$refs.vuetable.changePage(page)
         },
         openModal() {
           this.showModal = true;
         },
         closeModal() {
          this.showModal = false;
         },
         getUsers() {
            axios.get('/leaders-data')
              .then(response => {
                  this.users = response.data;
              });
         },
         getModules() {
             axios.get('/modules-data')
              .then(response => {
                  this.modules = response.data;
              });
         },
         createRole() {
              axios.post('/role', this.$data)
                  .then(response => {
                     this.showModal = false;
                     this.user_id = "";
                     this.module_id = "";
                     this.role = "";
                    this.$refs.vuetable.reload()

              })
              .catch(error => {
                this.showError(error.response.data)
              });
         },
          showError (message) {
            var errorString = '';
                for(var prop in message) {
                    if (Array.isArray(prop)) {
                        for (var msg in prop) {
                            errorString += message[prop] + '<BR>';
                        } 
                    } 
                    else {
                      errorString += message[prop] + '<BR>';
                    }
                }

              swal({
                type: 'error',
                title: 'Oops...',
                html:  errorString
              })
          },
          onActions (action,data,index) {
            for (var i = 0; i <= this.$children[0].$children.length - 1; i++) {
              this.$children[0].$children[i].module = "role";
            }
            if(data.action=="view-item") {
               swal({
                title: '<b>ID#</b>' + data.data.id,
                type: 'info',
                html:
                 '<table class="table">' +
                  '<tbody>' +
                    '<tr>' +
                      '<th scope="row">ID</th>' +
                      '<td>'+ data.data.id +'</td>' +
                    '</tr>' +
                   '<tr>' +
                      '<th scope="row">Module</th>' +
                      '<td>'+ data.data.module +'</td>' +
                    '</tr>' +
                   '<tr>' +
                      '<th scope="row">Operation</th>' +
                      '<td>'+ data.data.operation +'</td>' +
                    '</tr>' +
                   '<tr>' +
                      '<th scope="row">User ID</th>' +
                      '<td>'+ data.data.user_id +'</td>' +
                    '</tr>'+
                  '</tbody>' +
                '</table>',
                confirmButtonText:'Ok',
              })
            } else if(data.action =="delete-item") {
               this.$refs.vuetable.reload()
            }


          }
       }
   
       
   
   }
</script>

 <style>
    .swal2-container {
      z-index: 10000;
    }
</style>