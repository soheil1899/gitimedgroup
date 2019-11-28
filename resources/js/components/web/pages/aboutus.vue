<template>
<div class="text-right" dir="rtl">
    <h2 class="mb-5"><strong>
        درباره شرکت
    </strong></h2>

    <div class="px-5" v-html="aboutus['to_content'][0]['Text']">

    </div>


</div>
</template>

<script>


    export default {
        name: "aboutus",

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
        props:['aboutus'],
        methods: {

        },
        mounted: function () {

        }

    }
</script>

<style scoped>

</style>
