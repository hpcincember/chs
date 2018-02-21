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
                        >
                          <template slot="actions" slot-scope="props">
                          <div class="custom-actions">
                            <button class="btn btn-primary btn-sm"
                              @click="onAction('view-item', props.rowData, props.rowIndex)">
                              View
                            </button>
                            <button class="btn btn-info btn-sm"
                              @click="onAction('edit-item', props.rowData, props.rowIndex)">
                              Edit
                            </button>
                            <button class="btn btn-danger btn-sm"
                              @click="onAction('delete-item', props.rowData, props.rowIndex)">
                              Delete
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
<script src="./role.js"></script>
 <style>
    .swal2-container {
      z-index: 10000;
    }
</style>