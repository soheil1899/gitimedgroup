<aside class="pt-4">
    <div class="px-5 px-md-0 mx-auto col-8 col-md-12">
        <img class="mx-auto px-1 d-block logo-image" src="/media/Layout/<?php echo e($setting['logo']); ?>" width="80%">
    </div>


    <menucumponent></menucumponent>


    <div dir="rtl" class="call-info d-none d-md-block px-2 pb-3">
        <h4>
            <strong>
                <i class="fas fa-globe-asia ml-2"></i>

                اطلاعات تماس</strong></h4>

        <div class="mx-3 mb-2 pr-5 pl-2">
            <label class="d-block"><strong>
                    <i class="fas fa-phone ml-2"></i>
                    شماره تماس :</strong></label>
            <label><?php echo e($setting['phone']); ?></label>
        </div>


        <div class="mx-3 mb-2 pr-5 pl-2">
            <label class="d-block"><strong>
                    <i class="far fa-envelope ml-2"></i>
                    ایمیل :</strong></label>
            <label><?php echo e($setting['email']); ?></label>
        </div>

        <?php if($setting['fax'] != null): ?>
            <div class="mx-3 mb-2 pr-5 pl-2">
                <label class="d-block"><strong>
                        <i class="fas fa-fax ml-2"></i>
                        فکس :</strong></label>
                <label><?php echo e($setting['fax']); ?></label>
            </div>
        <?php endif; ?>

        <div class="mx-3 mb-2 pr-5 pl-2">
            <label class="d-block"><strong>
                    <i class="fas fa-map-marked-alt ml-2"></i>
                    آدرس :</strong></label>
            <label><?php echo e($setting['address']); ?></label>
        </div>
    </div>

</aside>
