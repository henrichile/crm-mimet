<div class="card-title" id="{{ runtimePermissions('lead-edit-title', $lead->permission_edit_lead) }}">
    {{ $lead->lead_title }}
</div>


<!--buttons: edit-->
@if($lead->permission_edit_lead)
<div id="card-title-edit" class="card-title-edit hidden">
  	<select class="form-control select2" id="lead_title" name="lead_title" data-placeholder="Seleccione" required >						  
                      <option value="Google" 				@if(strtolower($lead->lead_title)=='google') selected="selected" @endif 	>Google</option>
                      <option value="Facebook" 				@if(strtolower($lead->lead_title)=='facebook') selected="selected" @endif 	>Facebook</option>
                      <option value="Instagram" 			@if(strtolower($lead->lead_title)=='instagram') selected="selected" @endif >Instagram</option>
                      <option value="Correo" 				@if(strtolower($lead->lead_title)=='correo') selected="selected" @endif >Correo</option>
                      <option value="Whatsapp Ventas" 		@if(strtolower($lead->lead_title)=='whatsapp ventas') selected="selected" @endif >Whatsapp Ventas</option>
                      <option value="Whatsapp Santa Lucia" 	@if(strtolower($lead->lead_title)=='whatsapp santa lucia') selected="selected" @endif >Whatsapp Santa Lucia</option>
                      <option value="Whatsapp La Cisterna" 	@if(strtolower($lead->lead_title)=='whatsapp la cisterna') selected="selected" @endif >Whatsapp La Cisterna</option>   
                      <option value="Whatsapp Vitacura" 	@if(strtolower($lead->lead_title)=='whatsapp santa lucia') selected="selected" @endif >Whatsapp Vitacura</option>
                      <option value="Whatsapp La Reina" 	@if(strtolower($lead->lead_title)=='whatsapp la reina') selected="selected" @endif >Whatsapp La Reina</option>
                      <option value="Llamado Ventas" 		@if(strtolower($lead->lead_title)=='llamado ventas') selected="selected" @endif >Llamado Ventas</option>
                      <option value="Llamado Santa Lucia" 	@if(strtolower($lead->lead_title)=='llamado santa lucia') selected="selected" @endif >Llamado Santa Lucia</option>
                      <option value="Llamado La Cisterna" 	@if(strtolower($lead->lead_title)=='llamado la cisterna') selected="selected" @endif >Llamado La Cisterna</option>   
                      <option value="Llamado Vitacura" 		@if(strtolower($lead->lead_title)=='llamado santa lucia') selected="selected" @endif >Llamado Vitacura</option>
                      <option value="Llamado La Reina" 		@if(strtolower($lead->lead_title)=='llamado la reina') selected="selected" @endif >Llamado La Reina</option>
                      <option value="Sucursal Santa Lucia" 	@if(strtolower($lead->lead_title)=='sucursal santa lucia') selected="selected" @endif >Sucursal Santa Lucia</option>
                      <option value="Sucursal La Cisterna" 	@if(strtolower($lead->lead_title)=='sucursal la cisterna') selected="selected" @endif >Sucursal La Cisterna</option>   
                      <option value="Sucursal Vitacura" 	@if(strtolower($lead->lead_title)=='sucursal santa lucia') selected="selected" @endif >Sucursal Vitacura</option>
                      <option value="Sucursal La Reina" 	@if(strtolower($lead->lead_title)=='sucursal la reina') selected="selected" @endif >Sucursal La Reina</option>
              	 </select> 

    <!--button: subit & cancel-->
    <div id="card-title-submit" class="p-t-10 text-right">
        <button type="button" class="btn waves-effect waves-light btn-xs btn-default"
            id="card-title-button-cancel">{{ cleanLang(__('lang.cancel')) }}</button>
        <button type="button" class="btn waves-effect waves-light btn-xs btn-danger"
            data-url="{{ url('/leads/'.$lead->lead_id.'/update-title') }}" data-progress-bar='hidden' data-type="form"
            data-form-id="card-title-edit" data-ajax-type="post" id="card-title-button-save">{{ cleanLang(__('lang.save')) }}</button>
    </div>
</div>
@endif

<!--this item is archived notice-->
@if(runtimeArchivingOptions())
<div id="card_archived_notice_{{ $lead->lead_id }}" class="alert alert-warning p-t-7 p-b-7 {{ runtimeActivateOrAchive('archived-notice', $lead->lead_active_state) }}"> <i class="mdi mdi-archive"></i> @lang('lang.this_lead_is_archived')
</div>
@endif