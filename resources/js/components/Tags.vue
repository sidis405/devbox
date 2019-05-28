<template>
    <div class="card" v-if="totalTags">
        <div class="card-header">{{ title }} ({{ totalTags }})</div>
        <div class="card-body">
            <a v-for="tag in tags" :style="`font-size: ${ tag.posts_count * 1.2}px`" :href="tag.link">{{ tag.name }}</a>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['title'],

        data(){
            return {
                tags: ''
            }
        },

        methods: {
            getData(){
                axios.get('/tags').then((response) => this.tags = response.data)
            }
        },

        computed: {
            totalTags(){
                return this.tags.length
            }
        },

        watch: {
            tags(newValue, oldValue){
                // console.log('newValue')
                // console.log(this.tags)
            }
        },

        mounted() {
            this.getData()
        }
    }
</script>
