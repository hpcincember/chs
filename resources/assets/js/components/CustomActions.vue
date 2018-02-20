 <template>
    <div class="custom-actions">
      <button class="btn btn-success btn-xs" @click="itemAction('view-item', rowData, rowIndex)">View</button>
      <button class="btn btn-primary btn-xs" @click="itemAction('edit-item', rowData, rowIndex)">Edit</button>
      <button class="btn btn-delete btn-xs" @click="itemAction('delete-item', rowData, rowIndex)">Delete</button>
    </div>
  </template>

  <script>
  export default {
    props: {
      rowData: {
        type: Object,
        required: true
      },
      rowIndex: {
        type: Number
      }
    },
    data(){
      return{
        module:'',
        data:''
      }
    },
    methods: {
      itemAction (action, data, index) {
           this.$parent.$emit('CustomAction:action-item', 'action', {action: action, data: data});
           if(action == "view-item") {
              this.view(index,data);
           }else if(action == "edit-item") {
              this.edit();
           } else if(action=="delete-item") {
              this.delete(data);
           }
           this.$parent.$emit('CustomAction:action-item', 'action', {action: action, data: data});
      },
      view(index,data){
          var self = this;
          axios.get('/'+ this.module +'/show/' + data.id)
          .then(function (response) {
            self.data = response.data;
          })
          .catch(function (error) {
            console.log(error);
          });
      },
      delete(data){
          .then(function (response) {
              swal(
                'Deleted!',
                'success'
              )
          })
          .catch(function (error) {
            console.log(error);
          });
      },
      edit(index,data){
        console.log(data)
      }
    },
  }
  </script>

  <style>
    .custom-actions button.ui.button {
      padding: 8px 8px;
    }
    .custom-actions button.ui.button > i.icon {
      margin: auto !important;
    }
  </style>