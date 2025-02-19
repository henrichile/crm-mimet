<?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <?php if($field->customfields_name!='lead_custom_field_6'): ?>
<div class="x-element">
    <div class="x-each">
        
        <div class="x-title"><span class="x-highlight"><?php echo e($field->customfields_title); ?></span></div>

        <div class="x-content">
            <?php echo e(customFieldValue($field->customfields_name, $lead, 'text')); ?>

        </div>
    </div>
</div>
 <?php endif; ?>
 <?php if($field->customfields_name=='lead_custom_field_6'): ?>
 <div class="x-element">
    <div class="x-each">
            <div class="x-title"><span class="x-highlight">Link producto</span></div>

            <div class="x-content">
                <a href="<?php echo e(customFieldValue('lead_custom_field_6', $lead, 'text')); ?>" target="_blank"><?php echo e(customFieldValue('lead_custom_field_6', $lead, 'text')); ?></a>
            </div>
    </div>
</div>     
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/mimet.etasoft.cl/public_html/application/resources/views/pages/lead/components/custom-fields.blade.php ENDPATH**/ ?>