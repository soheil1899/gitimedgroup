<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <title><?php echo e(@$header->title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" ref="<?php echo e(asset('/media/Layout/'.\App\setting::where('lang',1)->first()->favicon)); ?>"
          type="image/png">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <meta name="description" content="<?php echo e(@$header->description); ?>">
    <meta name="msapplication-TileColor" content="red">
    <meta name="theme-color" content="red">
    <meta name="msapplication-navbutton-color" content="red">
    <meta name="apple-mobile-web-app-status-bar-style" content="red">
    <meta name="google-site-verification" content="..."/>
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <meta property="og:title" content="<?php echo e(@$header->title); ?>">
    <meta property="og:description" content=<?php echo e(@$header->description); ?>"">
    <meta property="og:image" content="<?php echo e(asset(@$header->image)); ?>">
    <!-- Twitter -->
    <meta property="twitter:card" content="">
    <meta property="twitter:url" content="<?php echo e(url()->current()); ?>">
    <meta property="twitter:title" content="<?php echo e(@$header->title); ?>">
    <meta property="twitter:description" content="<?php echo e(@$header->description); ?>">
    <meta property="twitter:image" content="<?php echo e(asset(@$header->image)); ?>">
    <?php echo $__env->yieldContent('css'); ?>

<style>
    body{
        background-color: #BDCCD4;
    }
    header{
        position: relative;
    }
    header .st0{
        fill: #0AAFE8;
    }
    header .st1{
        fill: #2183B0;
    }
    .header-title{
        position: absolute;
        top:50px;
        right: 50px;
        direction: rtl;
        color: #fff;
        text-align: right;
    }
    .header-title-en{
        position: absolute;
        top:50px;
        left: 50px;
        direction: ltr;
        color: #fff;
    }
    footer{
        position: relative;
        width: 100%;
        background-color: #2183B0;
        height: 230px;
    }
    .footer-top{
        position: absolute;
        top:0;
        left: 0;
        width: 100%;
        height: 35px;
        direction: ltr;
        color: #fff;
        background-color: #0AAFE8;
        padding: 3px 75px;
    }
    footer .bottem{
        text-align: right;
        direction: rtl;
        padding: 100px 40px 0 0;
        color: #fff;
    }
    aside{
        border-left: 2px solid #fff;
    }
    .aside-menu{
        text-align: right;
        list-style: none;
        padding: 0 10px ;
    }
    .aside-menu li{
        height: 40px;
        margin: 3px 0;
        background-color: #2183B0;
    }

    .aside-menu li a{
        color: #fff !important;
        font-size: 20px;
        margin-right: 10px;
        padding-top: 3px;
        display: block;
    }
    aside .call-info{
        text-align: right;
        margin-top: 30px;
        border-top: 2px solid #fff;
        color: #175d7d;
    }
    .call-info h4 strong{
        padding: 30px 30px;
        color: #175d7d;
        display: block;
    }
</style>

</head>
<body>



<?php echo $__env->make('website.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row m-0">
    <div class="col-lg-10 col-md-9" dir="rtl" id="app">


        <?php echo $__env->yieldContent('main'); ?>


    </div>

    <div class="col-lg-2 col-md-3 pr-0">
        <?php echo $__env->make('website.layouts.aside', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

</div>


<?php echo $__env->make('website.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


</body>
<?php echo $__env->yieldContent('js'); ?>
</html>
<script>
    import ExamplesStyling from "@johmun/vue-tags-input/docs/pages/examples/styling/index";
    export default {
        components: {ExamplesStyling}
    }
</script>