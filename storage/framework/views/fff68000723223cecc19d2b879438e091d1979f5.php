<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/app.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>




        <?php if(isset($id)): ?>
            <<?php echo e($component); ?> :id="<?php echo e($id); ?>"></<?php echo e($component); ?>>
        <?php else: ?>
            <<?php echo e($component); ?>></<?php echo e($component); ?>>
        <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>