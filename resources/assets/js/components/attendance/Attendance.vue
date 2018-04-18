<template>
	<div class="container">
		<h1>Attendance</h1>
		<input type="button" value="Create" class="btn btn-primary" @click="showCreate()">
		<div>
			<div class="form-group">
				<input type="text" v-model.lazy="keywords"  class="form-control" v-on:keyup.enter="pressEnter" placeholder="Search here..">
			
			</div>
			<!-- <div class="form-group col-lg-4">
					<label>Filter by Network:</label>
					<select class="form-control" v-model="network">
					<option :value="network.id" v-for="network in networks">{{network.name}}</option>
				</select>
			</div> -->
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th @click="sortLeaders">Leader</th>
					<th v-for="sunday in sundays">{{ formatSundayForFunction(sunday.date) }}</th>
				</tr>
			</thead>
			<tbody>
				<tr  v-for="leader in leaderAttendance">
					 <td>{{ leader.first_name }} {{ leader.last_name }}</td>
					<td v-for="sunday in sundays" :class="[(split(leader.attendance).indexOf(formatSundayForFunction(sunday.date)) > -1) ? 'success' : 'danger']">{{ (split(leader.attendance).indexOf(formatSundayForFunction(sunday.date)) > -1) ? "Present" : "Absent" }}</td>
				</tr>
				
			</tbody>
		</table>
		<div class="pagination">
			<button class="btn btn-primary" @click="fetchPagination(pagination.prev_page_url)" :disabled="!pagination.prev_page_url">Previous</button>
			<span>Page {{ pagination.current_page  }} of {{ pagination.last_page }}</span>
			<button class="btn btn-primary" @click="fetchPagination(pagination.next_page_url)" :disabled="!pagination.next_page_url">Next</button>
		</div>
		<create></create>
	</div>
</template>

<script>
	import {mapGetters} from 'vuex'
	import Create from './Create'
	export default{
		components:{
			Create
		},
		data(){
			return {
				form: {
					leader:''
				},
				keywords:'',
				network:''
			}
		},
		computed:{
			...mapGetters({
				sundays:'getSundaysPerMonth',
				leaderAttendance:'getLeadersAttendance',
				leaders:'getLeaders',
				pagination:'getPagination',
				networks:'getNetworks'
			}),

		},
		watch: {
	        keywords(after, before) {
	            this.pressEnter();
	        },
	        network(after, before) {
	            this.searchByNetwork();
	        }
	    },	
		created(){
			this.$store.dispatch("getSundaysPerMonth")
			this.$store.dispatch("getLeadersAttendance",'/attendance-leaders-page-data')
			this.$store.dispatch("setLeaders")
			this.$store.dispatch("setNetwork")

		},
		methods:{
			formatSunday(date){
				return moment(date).format('MMMM DD YYYY');
			},
			formatSundayForFunction(date){
				return moment(date).format('YYYY-MM-DD');
			},
		    split(dates){
              if(dates) {
                return dates.split(",");
              }
              return "";
            },
            fetchPagination(url){
            	this.$store.dispatch("getLeadersAttendance",url)
            },
            checkIfEmpty(url){
            	console.log(this.current_page);
            	if(url === null) {
            		return true
            	}
            	return false
            },
            pressEnter(){
            	this.$store.dispatch("searchLeadersAttendance",this.keywords)
            },
            sortLeaders(){
            	alert("sort leaders name");
            },
            searchByNetwork(){
            	this.$store.dispatch("searchLeadersAttendanceByNetwork",this.network)
            },
            showCreate(){
            	this.$emit("modal")
            }
		}
	}
</script>