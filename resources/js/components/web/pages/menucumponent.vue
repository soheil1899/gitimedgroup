<template>
<div dir="rtl" class="text-right">




    <nav class="navbar d-none d-md-block">
        <button class="navbar-toggler d-block d-md-none" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="true" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse show" id="navbarNavDropdown">
            <ul class="nav flex-column aside-menu navbar-nav mt-3">
                <template v-for="item in menu">
                <li class="nav-item dropdown" v-if="checkchild(item['to_parent_menu'])">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true"
                       aria-expanded="false">{{item['name']}}
                        <i class="fas fa-chevron-circle-left"></i>
                    </a>
                    <div class="dropdown-menu bignav position-absolute">

                        <a v-for="row in item['to_parent_menu']" class="dropdown-item  m-0" :href="'/'+row.url">{{row['name']}}</a>

                    </div>
                </li>

                <li class=" nav-item" v-else>
                    <a class="nav-link" v-if="item.url != '/'" :href="'/'+item.url">{{item['name']}}</a>
                    <a class="nav-link" v-else :href="item.url">
                    <i class="fa fa-home ml-3"></i>
                        {{item['name']}}
                    </a>
                </li>

                </template>
            </ul>
        </div>
    </nav>






    <nav class="d-block d-md-none navbar">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown2" aria-controls="navbarNavDropdown2" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown2">
            <ul class="navbar-nav">
                <template v-for="item in menu">
                <li class="nav-item dropdown" v-if="checkchild(item['to_parent_menu'])">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{item['name']}}
                    </a>
                    <div class="dropdown-menu minnav" aria-labelledby="navbarDropdownMenuLink">
                        <a v-for="row in item['to_parent_menu']" class="dropdown-item" :href="'/'+row.url">{{row['name']}}</a>
                    </div>
                </li>
                <li class="nav-item" v-else>
                    <a class="nav-link" v-if="item.url != '/'" :href="'/'+item.url">{{item['name']}}</a>
                    <a class="nav-link" v-else :href="item.url">{{item['name']}}</a>
                </li>
                </template>
            </ul>
        </div>
    </nav>





</div>
</template>

<script>


    export default {
        name: "menucumponent",

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
                menu: [],
            }
        },
        components: {

        },
        methods: {
            checkchild(childs){
                if(childs.length > 0){
                    return true;
                }else{
                    return false;
                }
            },
            reloadpage(){
                let that = this;
                axios.post('/menucomponent')
                    .then(function (response) {
                        that.menu = response.data;
                        console.log(response.data);
                    });
            }

        },
        mounted: function () {

            this.reloadpage();

        }

    }
</script>

<style scoped>


</style>
