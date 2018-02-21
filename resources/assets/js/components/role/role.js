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
         showEditModal: false,
         module_id: '',
         user_id: '',
         role: '',
         fields: [
           { name: 'id', title: 'Id' },
           { name: 'module',title: 'Module' },
           { name: 'operation', title: 'operation' },
           { name: 'user_id', title: 'User ID' },
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
          this.showModal = this.showEditModal = false;
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
            if (action == "view-item") {
                this.viewItem(data,index);
            } else if (action == "edit-item") {
                this.editItem();
            } else if (action == "delete-item") {
                this.deleteItem(data,index);

            }
          },
          viewItem(data,index){
             axios.get('/role/show/' + data.id)
              .then(function (response) {
                swal({
                  title: '<b>Operation ID#</b>' + response.data[0].id,
                  type: 'info',
                  html:
                    '<table class="table table-hover">' +
                      '<tbody>' +
                        '<tr>' +
                          '<td>ID</td>' +
                          '<td>'+ response.data[0].id +'</td>' +
                        '</tr>' +
                        '<tr>' +
                          '<td>Module</td>' +
                          '<td>'+ response.data[0].module +'</td>' +
                        '</tr>' +
                        '<tr>' +
                          '<td>Operation</td>' +
                          '<td>'+ response.data[0].operation +'</td>' +
                        '</tr>' +
                        '<tr>' +
                          '<td>User Id</td>' +
                          '<td>'+ response.data[0].user_id +'</td>' +
                        '</tr>' +
                      '</tbody>',
                  confirmButtonText:
                    'Ok',
                })
              })
              .catch(function (error) {
                console.log(error);
              });

          },
          editItem(){
            this.showEditModal = true;
          },
          deleteItem(data,index){
              self = this;
              swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
              }).then((result) => {
                if (result.value) {
                  axios.delete('/role/' + data.id)
                   .then(function (response) {
                       swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                       self.$refs.vuetable.reload();
                    })
                  .catch(function (error) {
                    console.log(error);
                  });
                                 
                }
              })
          }
       }
   
       
   
   }
