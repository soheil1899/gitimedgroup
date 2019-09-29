<template>

    <div>

        <div v-for="item in aboutus">
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


    import Sliderflux from "../tools/sliderflux";
    export default {
        name: "firstpage",
        components: {
            Sliderflux
        },
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
                aboutus: [],
            }
        },
        methods: {
            loadfirtspage() {
                let that = this;
                axios.post('/getaboutus')
                    .then(function (response) {
                        that.aboutus = response.data['to_content'];
                    });


            }
        },
        mounted: function () {
            this.loadfirtspage();

        }

    }
</script>

<style scoped>
    .boxfirstpage {
        margin-top: 30%;
        text-align: right;
        padding: 10%;
    }

    .namefirstpage1 {
        font-size: 21px;
        font-weight: bold;
    }

    .namefirstpage2 {
        font-size: 40px;
        font-weight: bold;
        color: red;
    }

    .namefirstpage3 {
        font-size: 30px;
        font-weight: bold;
        margin-top: 10px;
    }

    .img-firstpage {
        padding: 5%;
    }
    .row{
        margin: 0px !important;
    }
    .border2{
        width: 100%;
        height: 100px;
        -webkit-box-shadow: -1px -1px 29px -1px rgba(0,0,0,0.58);
        -moz-box-shadow: -1px -1px 29px -1px rgba(0,0,0,0.58);
        box-shadow: -1px -1px 29px -1px rgba(0,0,0,0.58);

    }
</style>
