<div class="card-title" id="<?php echo e(runtimePermissions('lead-edit-title', $lead->permission_edit_lead)); ?>">
    <?php echo e($lead->lead_title); ?>

</div>


<!--buttons: edit-->
<?php if($lead->permission_edit_lead): ?>
<div id="card-title-edit" class="card-title-edit hidden">
  	<select class="form-control select2" id="lead_title" name="lead_title" data-placeholder="Seleccione" required >						  
                      <option value="Google" 				<?php if(strtolower($lead->lead_title)=='google'): ?> selected="selected" <?php endif; ?> 	>Google</option>
                      <option value="Facebook" 				<?php if(strtolower($lead->lead_title)=='facebook'): ?> selected="selected" <?php endif; ?> 	>Facebook</option>
                      <option value="Instagram" 			<?php if(strtolower($lead->lead_title)=='instagram'): ?> selected="selected" <?php endif; ?> >Instagram</option>
                      <option value="Correo" 				<?php if(strtolower($lead->lead_title)=='correo'): ?> selected="selected" <?php endif; ?> >Correo</option>
                      <option value="Whatsapp Ventas" 		<?php if(strtolower($lead->lead_title)=='whatsapp ventas'): ?> selected="selected" <?php endif; ?> >Whatsapp Ventas</option>
                      <option value="Whatsapp Santa Lucia" 	<?php if(strtolower($lead->lead_title)=='whatsapp santa lucia'): ?> selected="selected" <?php endif; ?> >Whatsapp Santa Lucia</option>
                      <option value="Whatsapp La Cisterna" 	<?php if(strtolower($lead->lead_title)=='whatsapp la cisterna'): ?> selected="selected" <?php endif; ?> >Whatsapp La Cisterna</option>   
                      <option value="Whatsapp Vitacura" 	<?php if(strtolower($lead->lead_title)=='whatsapp santa lucia'): ?> selected="selected" <?php endif; ?> >Whatsapp Vitacura</option>
                      <option value="Whatsapp La Reina" 	<?php if(strtolower($lead->lead_title)=='whatsapp la reina'): ?> selected="selected" <?php endif; ?> >Whatsapp La Reina</option>
                      <option value="Llamado Ventas" 		<?php if(strtolower($lead->lead_title)=='llamado ventas'): ?> selected="selected" <?php endif; ?> >Llamado Ventas</option>
                      <option value="Llamado Santa Lucia" 	<?php if(strtolower($lead->lead_title)=='llamado santa lucia'): ?> selected="selected" <?php endif; ?> >Llamado Santa Lucia</option>
                      <option value="Llamado La Cisterna" 	<?php if(strtolower($lead->lead_title)=='llamado la cisterna'): ?> selected="selected" <?php endif; ?> >Llamado La Cisterna</option>   
                      <option value="Llamado Vitacura" 		<?php if(strtolower($lead->lead_title)=='llamado santa lucia'): ?> selected="selected" <?php endif; ?> >Llamado Vitacura</option>
                      <option value="Llamado La Reina" 		<?php if(strtolower($lead->lead_title)=='llamado la reina'): ?> selected="selected" <?php endif; ?> >Llamado La Reina</option>
                      <option value="Sucursal Santa Lucia" 	<?php if(strtolower($lead->lead_title)=='sucursal santa lucia'): ?> selected="selected" <?php endif; ?> >Sucursal Santa Lucia</option>
                      <option value="Sucursal La Cisterna" 	<?php if(strtolower($lead->lead_title)=='sucursal la cisterna'): ?> selected="selected" <?php endif; ?> >Sucursal La Cisterna</option>   
                      <option value="Sucursal Vitacura" 	<?php if(strtolower($lead->lead_title)=='sucursal santa lucia'): ?> selected="selected" <?php endif; ?> >Sucursal Vitacura</option>
                      <option value="Sucursal La Reina" 	<?php if(strtolower($lead->lead_title)=='sucursal la reina'): ?> selected="selected" <?php endif; ?> >Sucursal La Reina</option>
              	 </select> 

    <!--button: subit & cancel-->
    <div id="card-title-submit" class="p-t-10 text-right">
        <button type="button" class="btn waves-effect waves-light btn-xs btn-default"
            id="card-title-button-cancel"><?php echo e(cleanLang(__('lang.cancel'))); ?></button>
        <button type="button" class="btn waves-effect waves-light btn-xs btn-danger"
            data-url="<?php echo e(url('/leads/'.$lead->lead_id.'/update-title')); ?>" data-progress-bar='hidden' data-type="form"
            data-form-id="card-title-edit" data-ajax-type="post" id="card-title-button-save"><?php echo e(cleanLang(__('lang.save'))); ?></button>
    </div>
</div>
<?php endif; ?>

<!--this item is archived notice-->
<?php if(runtimeArchivingOptions()): ?>
<div id="card_archived_notice_<?php echo e($lead->lead_id); ?>" class="alert alert-warning p-t-7 p-b-7 <?php echo e(runtimeActivateOrAchive('archived-notice', $lead->lead_active_state)); ?>"> <i class="mdi mdi-archive"></i> <?php echo app('translator')->get('lang.this_lead_is_archived'); ?>
</div>
<?php endif; ?><?php /**PATH /home/crmhuelen/public_html/application/resources/views/pages/lead/components/title.blade.php ENDPATH**/ ?>