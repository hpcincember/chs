import Vuetable from 'vuetable-2/src/components/Vuetable'
import VuetablePagination from 'vuetable-2/src/components/VuetablePaginationDropdown'
import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'
export default {
  components: {
    Vuetable,
    VuetablePagination,
    VuetablePaginationInfo
  },
  data(){
  	return{
  		fields: [
        { name:'id',title:'Id'},
        { name:'first_name',title:'First Name'},
        { name:'middle_name',title:'Middle Name'},
        { name:'last_name',title:'Last Name'},
        { name:'suffix',title:'Suffix'},
        { name:'gender',title:'Gender'},
        { name:'school',title:'School'},
        { name:'work_place',title:'Work Place'},
        { name:'contact_number',title:'Contact Number'},
        { name:'fb_account',title:'Facebook Account'},
        { name:'email_address',title:'Email Address'},
        { name:'level',title:'Level'},
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
      items:[]
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
        console.log(action + data + index)
        if(action == "view-item") {
           this.viewItem(data);
        }

     },
     viewItem(data){
      self = this;
        axios.get('/leader/show/' + data.id)
              .then(function (response) {
                self.items = response.data[0];
                self.$refs.modal.open();
          })
          .catch(function (error) {
            console.log(error);
          });
     }
  }
}
