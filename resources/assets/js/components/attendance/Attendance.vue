<template>
	<div class="container">
		<h1>Attendance</h1>
		<table class="table table-bordered">
			<tr>
				<th>Leader</th>
				<th v-for="sunday in sundays">{{ formatSundayForFunction(sunday.date) }}</th>
			</tr>
			<tbody>
				<tr  v-for="leader in leaderAttendance">
					 <td>{{ leader.first_name }} {{ leader.last_name }} {{ leader.attendance}}</td>
					 <td v-for="sunday in sundays">{{ isPresent(leader.attendance,sunday) }}</td>
				</tr>
				
			</tbody>
		</table>
	</div>
</template>


<script>
	import {mapGetters} from 'vuex'
	export default{
		computed:{
			...mapGetters({
				sundays:'getSundaysPerMonth',
				leaderAttendance:'getLeadersAttendance'
			})
		},
		created(){
			this.$store.dispatch("getSundaysPerMonth")
			this.$store.dispatch("getLeadersAttendance")
		},
		methods:{
			formatSunday(date){
				return moment(date).format('MMMM DD YYYY');
			},
			formatSundayForFunction(date){
				return moment(date).format('YYYY-MM-DD');
			},
			isPresent(date,sunday){
				if(date) {
					var res = date.split(',');
					return res.indexOf(this.formatSundayForFunction(sunday))
				}
			}
		}
	}
</script>