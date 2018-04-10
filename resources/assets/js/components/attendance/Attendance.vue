<template>
	<div class="container">
		<h1>Attendance</h1>
		<div class="col-lg-4">
			<div class="form-group">
				<select name="" id="" class="form-control" v-model="form.leader"> 
					<option value="" v-for="leader in leaders">{{ leader.first_name}} {{ leader.last_name }}</option>
				</select>
			</div>
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Leader</th>
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
	</div>
</template>

<script>
	import {mapGetters} from 'vuex'
	export default{
		data(){
			return {
				form: {
					leader:''
				}
			}
		},
		computed:{
			...mapGetters({
				sundays:'getSundaysPerMonth',
				leaderAttendance:'getLeadersAttendance',
				leaders:'getLeaders'
			})
		},
		created(){
			this.$store.dispatch("getSundaysPerMonth")
			this.$store.dispatch("getLeadersAttendance")
			this.$store.dispatch("setLeaders")
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
            }
		}
	}
</script>