import Vuetable from 'vuetable-2/src/components/Vuetable'
import VuetablePagination from 'vuetable-2/src/components/VuetablePaginationDropdown'
import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'
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
        { name:'gender',title:'Gender',callback:'gender'},
        { name:'school',title:'School'},
        { name:'work_place',title:'Work Place'},
        { name:'contact_number',title:'Contact Number'},
        { name:'fb_account',title:'Facebook Account'},
        // { name:'email_address',title:'Email Address'},
        { name:'level',title:'Level'},
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
     },
     gender(gender){
       return (gender == 1) ? 'Male' : 'Female'
     }
  }
}
