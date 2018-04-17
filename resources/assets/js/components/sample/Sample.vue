<template>
    <div class="container">
        <input type="text" v-model.lazy="keywords"  class="form-control" v-on:keyup.enter="pressEnter">
        <ul v-if="results.length > 0">
            <li v-for="result in results" :key="result.id" v-text="result.first_name"></li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            keywords: null,
            results: []
        };
    },

    watch: {
        keywords(after, before) {
            this.fetch();
        }
    },

    methods: {
    	pressEnter(){
    		this.fetch();
    	},
        fetch() {
            axios.get('/attendance-search', { params: { keywords: this.keywords } })
                .then(response => this.results = response.data)
                .catch(error => {});
        }
    }
}
</script>