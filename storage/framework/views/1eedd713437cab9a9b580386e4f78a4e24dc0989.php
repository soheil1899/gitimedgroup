<aside class="">
    <div class="px-5 px-md-0 mx-auto col-8 col-md-12">
        <img class="mx-auto d-block" src="/media/Layout/<?php echo e($setting['logo']); ?>" width="80%">
    </div>


    <menucumponent></menucumponent>


    <div dir="rtl" class="call-info d-none d-md-block">
        <h4><strong>اطلاعات تماس</strong></h4>

        <div class="mx-3 mb-2">
            <label><strong>شماره تماس :</strong></label>
            <label><?php echo e($setting['phone']); ?></label>
        </div>


        <div class="mx-3 mb-2">
            <label><strong>ایمیل :</strong></label>
            <label><?php echo e($setting['email']); ?></label>
        </div>

        <?php if($setting['fax'] != null): ?>
            <div class="mx-3 mb-2">
                <label><strong>فکس :</strong></label>
                <label><?php echo e($setting['fax']); ?></label>
            </div>
        <?php endif; ?>

        <div class="mx-3 mb-2">
            <label><strong>آدرس :</strong></label>
            <label><?php echo e($setting['address']); ?></label>
        </div>
    </div>

</aside>
