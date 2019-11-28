<template>
    <div dir="rtl" class="text-right px-4">


        <div class="d-none d-md-block">
            <ul class="aside-menu mt-3 position-relative">
                <template v-for="(item, index) in menu" class="position-relative">



                    <li class="pointer position-relative" v-if="checkchild(item['to_parent_menu'])"
                        @click="showfirst(index, item['to_parent_menu'])">
                        <a>{{item.name}}</a>
                        <i class="fas fa-chevron-circle-left float-left m-2 fa-lg"></i>
                    </li>


                    <li class="pointer" v-else>
                        <template v-if="item.url != '/' && item.url != 'gallery' && item.url != 'managers' && item.url != 'article/news'">
                            <a :href="'/articles/'+item.url">{{item.name}}</a>
                        </template>
                        <template v-else-if="item.url == '/'">
                            <i class="fa fa-home mr-3 fa-lg text-white"></i>
                            <a style="display: inline-block" :href="item.url">{{item.name}}</a>
                        </template>
                        <template v-else>
                            <a :href="'/'+item.url">{{item.name}}</a>
                        </template>
                    </li>
                </template>

                <div class="position-absolute firstchild" v-if="firstchild">
                    <ul class="aside-menu mt-3 position-relative">
                        <template v-for="(child, index2) in firstchilds" class="position-relative">
                            <li class="pointer position-relative m-0" v-if="checkchild(child['to_parent_menu'])"
                                @click="showsecond(index2, child['to_parent_menu'])">
                                <a>{{child.name}}</a>
                                <i class="fas fa-chevron-circle-left float-left m-2 fa-lg"></i>
                            </li>
                            <li class="pointer m-0" v-else>
                                <a :href="'/articles/'+child.url">{{child.name}}</a>
                            </li>
                        </template>
                        <div class="position-absolute secondchild" v-if="secondchild">
                            <ul class="aside-menu mt-3 position-relative">
                                <template v-for="(child2, index3) in secondchilds" class="position-relative">
                                    <li class="pointer m-0">
                                        <a :href="'/articles/'+child2.url">{{child2.name}}</a>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </ul>
                </div>
            </ul>
        </div>


        <nav class="d-block d-md-none navbar">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown2"
                    aria-controls="navbarNavDropdown2" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown2">
                <ul class="navbar-nav">
                    <template v-for="item in menu">
                        <li class="nav-item dropdown" v-if="checkchild(item['to_parent_menu'])">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{item['name']}}
                            </a>
                            <div class="dropdown-menu minnav" aria-labelledby="navbarDropdownMenuLink">
                                <ul class="navbar-nav">
                                    <template v-for="row in item['to_parent_menu']">
                                        <li class="nav-item dropdown" v-if="checkchild(row['to_parent_menu'])">
                                            <a onclick="changeclass(this)" class="nav-link dropdown-toggle"
                                               id="navbarDropdownMenuLink1"
                                               role="button"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{row['name']}}
                                            </a>
                                            <div class="dropdown-menu minnav" aria-labelledby="navbarDropdownMenuLink1">
                                                <ul>
                                                    <template v-for="last in row['to_parent_menu']">
                                                        <li class="nav-item">
                                                            <a class="dropdown-item" :href="'/'+last.url">{{last['name']}}</a>
                                                        </li>
                                                    </template>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="dropdown-item" :href="'/'+row.url">{{row['name']}}</a>
                                        </li>
                                    </template>
                                </ul>
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
                firstchild: false,
                firsttop: null,
                firstchilds: [],

                secondchild: false,
                secondtop: null,
                secondchilds: [],


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
        components: {},
        methods: {
            showfirst(index, childs) {
                if (this.firstchild && index+1 == this.firsttop){
                    this.firstchild = false;
                    this.secondchild = false;
                }else if(this.firstchild && index+1 != this.firsttop){
                    this.secondchild = false;
                    this.firsttop = index + 1;
                    this.firstchilds = childs;
                } else {
                    this.firstchild = true;
                    this.firsttop = index + 1;
                    this.firstchilds = childs;
                }
            },
            showsecond(index, childs) {
                if (this.secondchild && index+1 == this.secondtop){
                    this.secondchild = false;
                }else if(this.secondchild && index+1 != this.secondtop){
                    this.secondtop = index + 1;
                    this.secondchilds = childs;
                } else {
                    this.secondchild = true;
                    this.secondtop = index + 1;
                    this.secondchilds = childs;
                }
            },
            checkchild(childs) {
                if (childs) {
                    if (childs.length > 0) {
                        return true;
                    } else {
                        return false;
                    }
                }
            },
            reloadpage() {
                let that = this;
                axios.post('/menucomponent')
                    .then(function (response) {
                        that.menu = response.data;
                    });
            }

        },
        mounted: function () {

            this.reloadpage();

        }

    }
</script>

<style scoped>
    .firstchild{
        top: -16px;
        right: 94%;
        width: 140%;
        z-index: 100;
    }
    .secondchild{
        top: -16px;
        right: 94%;
        width: 80%;
        z-index: 100;
    }
    .fa-chevron-circle-left {
        position: absolute;
        top: 4px;
        left: 0;
        color: white;
    }

    .dropdown-item {
        background-color: transparent !important;
    }

    .pointer {
        cursor: pointer;
    }

    .aside-menu a {
        text-decoration: none;
    }

</style>
