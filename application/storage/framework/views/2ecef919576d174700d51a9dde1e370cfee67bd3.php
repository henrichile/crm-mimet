<?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <?php if($field->customfields_name!='lead_custom_field_11' && $field->customfields_name!='lead_custom_field_12'): ?>
<div class="x-element">
    <div class="x-each">
        
        <div class="x-title"><span class="x-highlight"><?php echo e($field->customfields_title); ?></span></div>

        <div class="x-content">
            <?php echo e(customFieldValue($field->customfields_name, $lead, 'text')); ?>

        </div>
    </div>
</div>
 <?php endif; ?>
 <?php if($field->customfields_name=='lead_custom_field_3' && customFieldValue($field->customfields_name, $lead, 'text')=="Femenino"): ?>
 <div class="x-element">
    <div class="x-each">
            <div class="x-title"><span class="x-highlight">¿Esta embarazada?</span></div>

            <div class="x-content">
                <?php echo e(customFieldValue('lead_custom_field_11', $lead, 'text')); ?>

            </div>
    </div>
</div>
<div class="x-element">
    <div class="x-each">           
             <div class="x-title"><span class="x-highlight">Meses de embarazo</span></div>

            <div class="x-content">
                <?php echo e(customFieldValue('lead_custom_field_12', $lead, 'text')); ?>

            </div>
    </div>
</div>        
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/crmhuelen/public_html/application/resources/views/pages/lead/components/custom-fields.blade.php ENDPATH**/ ?>