<template>
    <div class="card">
        <div class="card-header">{{ title }}</div>
        <div class="card-body">
            <ul>
                    <li v-for="category in categories">
                        <a :href="category.link">{{ category.name }} ({{ category.posts_count}})</a>
                    </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['title', 'categories'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
