<template>
    <div dir="rtl" class="text-right">
        <h2 class="mb-5"><strong>
            اعضای هیات مدیره
        </strong></h2>

        <div class="row px-3">

                <div v-for="item in managers['to_article']" :key="item.id" class="col-6 col-lg-4 border py-2 managers">
                    <a :href="'/managers/'+item.url">
                    <img :src="imageurl(item.to_content)" width="100%" height="100%">
                    <h5>
                        <strong class="mt-3 d-block">{{item['name']}}</strong>
                    </h5>
                    </a>
                </div>


        </div>


    </div>
</template>

<script>


    export default {
        name: "news",

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
        components: {},
        props: ['managers'],
        methods: {
            imageurl(content){
                for (var i=0; i<content.length ; i++){
                    if(content[i]['methods'] == 'Images'){
                        return content[i]['title'];
                    }
                }
            }

        },
        mounted: function () {

            console.log(this.managers);
        }

    }
</script>

<style scoped>

</style>
