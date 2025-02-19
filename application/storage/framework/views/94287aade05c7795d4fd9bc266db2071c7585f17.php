<div class="row">
    <div class="col-lg-12">
        <!--name-->
        <div class="form-group row">
            <label class="col-12 text-left control-label col-form-label required"><?php echo e(cleanLang(__('lang.name'))); ?>*</label>
            <div class="col-12">
                <input type="text" class="form-control form-control-sm" id="taxrate_name" name="taxrate_name"
                    value="<?php echo e($taxrate->taxrate_name ?? ''); ?>">
            </div>
        </div>
        <!--rate-->
        <div class="form-group row">
            <label class="col-12 text-left control-label col-form-label required"><?php echo e(cleanLang(__('lang.rate'))); ?> (%)</label>
            <div class="col-12">
                <input type="number" class="form-control form-control-sm" id="taxrate_value" name="taxrate_value"
                    value="<?php echo e($taxrate->taxrate_value ?? ''); ?>">
            </div>
        </div>
    </div>
</div><?php /**PATH /home/mimet.etasoft.cl/public_html/application/resources/views/pages/settings/sections/taxrates/modals/add-edit-inc.blade.php ENDPATH**/ ?>