   import Vuetable from 'vuetable-2/src/components/Vuetable'
   import VuetablePagination from 'vuetable-2/src/components/VuetablePaginationDropdown'
   //import VuetablePagination from 'vuetable-2/src/components/VuetablePagination'
   import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'
   import Vue from 'vue'
   import Modal from './../Modal'
   
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
              name: '__slot:actions',   // <----
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

          onAction (action, data, index) {
            console.log('slot) action: ' + action, data.id, index)
            if (action == "view-item") {

            } else if (action == "view-item") {

            } else if (action == "delete-item") {

            }
          },
          editItem(){

          },
          viewItem(){

          },
          deleteItem(){

          }
       }
   
       
   
   }
