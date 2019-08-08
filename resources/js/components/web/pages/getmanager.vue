<template>
<div class="getmanager text-right" dir="rtl">
    <h2 class="mb-5"><strong>
        {{manager['name']}}
    </strong></h2>


    <div v-for="item in manager.to_content">
        <div v-if="item.methods=='Paragraph'">
            <p v-html="item.Text"></p>
        </div>
        <div v-if="item.methods=='Title'">
            <h3>{{ item.title }}</h3>
        </div>
        <div v-if="item.methods=='Images'" class="mb-3">
            <img :src="item.title" width="200px" height="200px">
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
        props:['manager'],
        methods: {

        },
        mounted: function () {

            console.log(this.manager);
        }

    }
</script>

<style scoped>

</style>
