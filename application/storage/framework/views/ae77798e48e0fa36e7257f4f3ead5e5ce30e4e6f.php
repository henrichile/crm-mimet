<!--user-->
<?php $__currentLoopData = $assigned; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<span class="x-assigned-user js-card-settings-button-static card-lead-assigned" tabindex="0" data-popover-content="card-lead-team"
        data-title="<?php echo e(cleanLang(__('lang.assign_users'))); ?>"><img src="<?php echo e(getUsersAvatar($user->avatar_directory, $user->avatar_filename)); ?>"
                data-toggle="tooltip" title="" data-placement="top" alt="Brian" class="img-circle avatar-xsmall"
                data-original-title="<?php echo e($user->first_name); ?>"></span>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/crmhuelen/public_html/application/resources/views/pages/lead/components/assigned.blade.php ENDPATH**/ ?>