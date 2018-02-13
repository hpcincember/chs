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
    methods: {
      itemAction (action, data, index) {
        
      },
      view(index,data){
         axios.get('/role/show/'+ data.id)
          .then(function (response) {
            console.log(response);
          })
          .catch(function (error) {
            console.log(error);
          });
      },
      delete(index,data){
        console.log(data)
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