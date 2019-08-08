<template>

    <div class="gallery text-center" dir="ltr">

        <img class="image m-2" v-for="(image, i) in images" :src="image" @click="onClick(i)" width="240px" height="140px">
        <vue-gallery-slideshow :images="images" :index="index" @close="index = null"></vue-gallery-slideshow>

    </div>


</template>

<script>

    import VueGallerySlideshow from 'vue-gallery-slideshow';

    export default {
        name: "gallery",
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
                },
                images: [],
                index: null
            }
        },
        components: {
            VueGallerySlideshow
        },
        methods: {
            loadfirtspage() {
                let that = this;
                axios.post('/getgallery')
                    .then(function (response) {
                        for (var i=0; i<response.data.length; i++){
                            that.images.push(response.data[i]['picture']);
                        }
                    });


            },
            onClick(i) {
                this.index = i;
            },
        },
        mounted: function () {
            this.loadfirtspage();

        }

    }
</script>

<style scoped>
</style>
