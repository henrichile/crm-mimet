<?php $__env->startSection('settings-page'); ?>
<span id="dynamic-settings-content" data-loading-target="embed-content-container"
    data-url="<?php echo e($page['dynamic_url'] ?? ''); ?>"></span>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.settings.wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mimet.etasoft.cl/public_html/application/resources/views/pages/settings/sections/dynamic/page.blade.php ENDPATH**/ ?>