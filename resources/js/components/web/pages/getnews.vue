<template>
<div dir="rtl" class="text-right">
    <h2 class="mb-5"><strong>
        {{news['name']}}
    </strong></h2>


    <div v-for="item in news.to_content">
        <div v-if="item.methods=='Paragraph'">
            <p v-html="item.Text"></p>
        </div>
        <div v-if="item.methods=='Title'">
            <h3>{{ item.title }}</h3>
        </div>
    </div>

</div>
</template>

<script>


    export default {
        name: "getnews",

        data() {
            return {
                toppage: {
                    data1: null,
                    data2: null,
                    data3: null,
                    data4: '',
                    data5: null,
                    data6: null,
                    data7: null,
                    searchbox: null,
                }
            }
        },
        components: {

        },
        props:['news'],
        methods: {

        },
        mounted: function () {

            console.log(this.news);
        }

    }
</script>

<style scoped>

</style>
