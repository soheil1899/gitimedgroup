<template>
    <div dir="rtl" class="text-right">
        <h2 class="mb-5"><strong>
            اعضای هیات مدیره
        </strong></h2>

        <div class="row px-3">

                <div v-for="item in managers['to_article']" :key="item.id" class="col-6 col-md-4 col-lg-3 p-3 py-2">
                    <div class="managers border">
                    <a :href="'/managers/'+item.url" class="mylink">
                    <div class="py-3 px-4">
                    <img :src="imageurl(item.to_content)" class="onenews">
                    </div>
                    <div class="px-3 pb-3">
                    <h5>
                        <strong class="mt-3 d-block">{{item['name']}}</strong>
                    </h5>
                    </div>
                    </a>
                    </div>
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
