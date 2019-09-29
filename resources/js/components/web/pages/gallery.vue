<template>

    <div class="gallery text-center" dir="ltr">

        <div class="row mx-0 my-5 px-5">
            <div class="col-6 col-lg-3 pb-2" v-for="thumb in images"
                 :key="thumb.id"
                 @click="showLightbox(thumb.name)">
                <img class="slider-image" :src="thumb.name"/>
            </div>
        </div>
        <lightbox id="mylightbox"
                  ref="lightbox"
                  :images="images"
                  :timeoutDuration="5000"
        ></lightbox>

<!--        <img class="image m-2" v-for="(image, i) in images" :src="image" @click="onClick(i)" width="240px" height="140px">-->
<!--        <vue-gallery-slideshow :images="images" :index="index" @close="index = null"></vue-gallery-slideshow>-->

    </div>


</template>

<script>

    // import VueGallerySlideshow from 'vue-gallery-slideshow';
    import Lightbox from 'vue-my-photos';

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
            // VueGallerySlideshow
            'lightbox': Lightbox
        },
        methods: {
            showLightbox: function (imageName) {
                this.$refs.lightbox.show(imageName);
            },
        },
        mounted: function () {
            let that = this;
            axios.post('/getgallery')
                .then(function (response) {
                    for (var i=0; i<response.data.length; i++){
                        var newarr = [];
                        newarr['id'] = i+1;
                        newarr['name'] = response.data[i]['picture'];
                        that.images.push(newarr);
                    }
                });
        }

    }
</script>

<style scoped>
    .slider-image {
        border: 2px solid #f1734b;
        width: 100%;
        height: 100%;
    }
</style>
