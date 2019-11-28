<template>
    <div>
        <div class="row m-0 my-4">
            <h3><strong>
                {{article.name}}
            </strong></h3>
        </div>

        <div class="row mx-3" v-for="(item, index) in article.to_content">
            <div class="my-1" v-if="item.methods == 'Title'">
                <h4>
                    {{item.title}}
                </h4>
            </div>
            <div class="my-1 mx-auto articleimg" v-if="item.methods == 'Images'">
                <img :src="item.title">
            </div>
            <div class="my-1" v-if="item.methods=='Paragraph'">
                <p v-html="item.Text"></p>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "ShowArticle",
        props: ['article'],
        data() {
            return {}
        },
        methods: {},
        mounted() {
            console.log(this.article);

        }
    }
</script>

<style scoped>
    .articleimg{
        max-width: 100%;
    }

</style>
