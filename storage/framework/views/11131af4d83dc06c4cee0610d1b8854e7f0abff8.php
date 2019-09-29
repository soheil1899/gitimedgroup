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

</head>
<body>

<div>

<?php echo $__env->make('website.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row m-0 " dir="rtl"  id="app">

    <div class="col-lg-3 col-md-4 pr-0 mb-5 mb-md-0">
        <?php echo $__env->make('website.layouts.aside', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>


    <div class="my-content col-lg-9 col-md-8 pt-4">


        <?php echo $__env->yieldContent('main'); ?>


    </div>


</div>


<?php echo $__env->make('website.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>

</body>
<?php echo $__env->yieldContent('js'); ?>
</html>
<script>
    import ExamplesStyling from "@johmun/vue-tags-input/docs/pages/examples/styling/index";
    export default {
        components: {ExamplesStyling}
    }
</script>
