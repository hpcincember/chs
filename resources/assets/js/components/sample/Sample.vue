<template>
	<div class="container">
		<h1>Sample Components</h1>
		<hr>
		<h2> {{ counter }}</h2>
		<hr>
		<input type="button" value="Increment" class="btn btn-primary" @click="increment(5)">
		<input type="button" value="Decrement" class="btn btn-info" @click="decrement(5)">
		<input type="button" value="By 10" class="btn btn-info" @click="incrementByTen(10)">
		<input type="button" value="By 20" class="btn btn-info" @click="incrementByTwenty(20)">
	</div>
</template>

<script>
	import  { mapGetters,mapMutations,mapActions } from 'vuex';
	export default {
		computed: {
			...mapGetters({
					fromCounter :'getDoubleCounter',
					counter:'getCounter'
				})
		},
		methods:{
			...mapActions([
				'increment','decrement','incrementByTen','incrementByTwenty'
				]),
			// increment() {
			// 	this.$store.dispatch('increment',by);
			// }
			// increment(){
			// 	this.$store.commit('increment');
			// },
			// decrement(){
			// 	this.$store.commit('decrement');
			// }
		}
	}
</script>