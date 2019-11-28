<template>
    <div v-if="partners.length != 0">
        <div class="title-index">
            <strong>همکاران ما</strong>
        </div>
        <div class="text-index">

            <div dir="ltr">
                <hooper :itemsToSlide="1" :itemsToShow="3" :autoPlay="true" :playSpeed="4000" :infiniteScroll="true">
                    <slide class="text-center" v-for="item in partners" :key="item.id">
                        <img class="mt-3 border" width="150px" height="150px" :src="item['to_content'][0]['title']">
                    </slide>

                </hooper>
            </div>
        </div>
    </div>
</template>

<script>
    import {
        Hooper,
        Slide,
        Pagination as HooperPagination
    } from 'hooper';


    export default {
        name: "partnercumponent",
        data() {
            return {
                partners: [],
            }
        },
        components: {
            Hooper,
            Slide,
            HooperPagination
        },
        methods: {
            reloadpage() {
                let that = this;
                axios.post('/getpartners')
                    .then(function (response) {
                        that.partners = response.data;
                    });
            },
        },
        mounted() {
            this.reloadpage();
        },
    }
</script>

<style scoped>

</style>
