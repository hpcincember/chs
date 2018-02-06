<template>
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">Example Component</div>
               <div class="panel-body">
                  <div>
                     <vuetable ref="vuetable"
                        api-url="http://127.0.0.1:8000/roles-data"
                        :fields="fields"
                        pagination-path=""
                        @vuetable:pagination-data="onPaginationData"
                        ></vuetable>
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
                          Modal title
                        </h3>
                          
                        <div slot="footer">
                         <button type="button" class="btn btn-outline-info" @click="closeModal()"> Close </button>
                         <button type="button" class="btn btn-primary" data-dismiss="modal" @click="submitAndClose()">
                           Submit
                         </button>
                        </div>
                      </modal>
                    </div>  
                  <!-- add end modal -->
                   <div id="wrapper" class="container">
                    <button type="button" class="btn btn-primary" @click="openModal()">Open Modal</button>
                   </div>
                
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
   
   Vue.component('custom-actions', CustomActions)
   export default {
     components: {
       Vuetable,
       VuetablePagination,
       VuetablePaginationInfo,
       Modal  
     },
     data() {
        return {
         showModal: false,
         fields: [
           {
             name: 'module',
             title: 'Module'
           },
           {
             name: 'operation',
             title: 'operation'
           },
           {
             name: '__component:custom-actions',   // <----
             title: 'Actions',
           }
         ]
       }
     },
      methods: {
       //...
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
       }
       }
   
       
   
   }
</script>