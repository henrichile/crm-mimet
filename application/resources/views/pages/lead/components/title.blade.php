<div class="card-title" id="{{ runtimePermissions('lead-edit-title', $lead->permission_edit_lead) }}">
    {{ $lead->lead_title }}
</div>


<!--buttons: edit-->
@if($lead->permission_edit_lead)
<div id="card-title-edit" class="card-title-edit hidden">
  	<select class="form-control select2" id="lead_title" name="lead_title" data-placeholder="Seleccione" required >						  
           <option value="Cotizador" 				@if(strtolower($lead->lead_title)=='Cotizador') selected="selected" @endif 	>Cotizador</option>
           <option value="Mundo Repuestos" 			@if(strtolower($lead->lead_title)=='Mundo Repuestos') selected="selected" @endif 	>Mundo Repuestos</option>
           <option value="Formulario de contacto" 	@if(strtolower($lead->lead_title)=='Formulario de contacto') selected="selected" @endif >Formulario de contacto</option>
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