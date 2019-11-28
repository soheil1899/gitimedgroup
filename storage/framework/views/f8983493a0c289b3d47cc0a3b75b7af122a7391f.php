<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/app.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>



    <div id="carouselExampleFade" class="carousel slide carousel-fade position-relative" data-ride="carousel">

        <ol class="carousel-indicators position-absolute">
            <li data-target="#carouselExampleFade" data-slide-to="0" class="active"></li>
            <?php
            for ($i = 1 ; $i < count($slider) ; $i++){
            ?>
            <li data-target="#carouselExampleFade" data-slide-to="<?php echo e($i); ?>"></li>
            <?php
            }
            ?>
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo e($slider[0]['picture']); ?>" alt="<?php echo e($i); ?> slide">
            </div>
            <?php
            for ($i = 1 ; $i < count($slider) ; $i++){
            ?>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo e($slider[$i]['picture']); ?>" alt="<?php echo e($i); ?> slide">
            </div>
            <?php
            }
            ?>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <img class="prev-button" src="/media/temp/button_prev.png">
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <img class="next-button" src="/media/temp/button_next.png">
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div class="title-index">
        <strong>درباره شرکت</strong>
    </div>
    <div class="text-index">

        <?php if(isset($id)): ?>
            <<?php echo e($component); ?> :id="<?php echo e($id); ?>">
    </<?php echo e($component); ?>>
    <?php else: ?>
        <<?php echo e($component); ?>></<?php echo e($component); ?>>
        <?php endif; ?>

        </div>




        <div class="title-index">
            <strong>آخرین اخبار</strong>
        </div>
        <div class="text-index">
            <ul>
                <?php


                if (count($news['toArticle']) > 5) {
                    $newscounter = 5;
                } else {
                    $newscounter = count($news['toArticle']);
                }

                for ($i = 0; $i < $newscounter; $i++){
                ?>
                <li>
                    <a href="/article/news/<?php echo e($news['toArticle'][$i]['url']); ?>"><?php echo e($news['toArticle'][$i]['name']); ?></a>
                </li>
                <?php
                }
                ?>



            </ul>
        </div>






        <partner-component></partner-component>

















<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>