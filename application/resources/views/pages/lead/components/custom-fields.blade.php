@foreach($fields as $field)

          @if($field->customfields_name!='lead_custom_field_11' && $field->customfields_name!='lead_custom_field_12')
<div class="x-element">
    <div class="x-each">
        
        <div class="x-title"><span class="x-highlight">{{ $field->customfields_title }}</span></div>

        <div class="x-content">
            {{ customFieldValue($field->customfields_name, $lead, 'text') }}
        </div>
    </div>
</div>
 @endif
 @if($field->customfields_name=='lead_custom_field_3' && customFieldValue($field->customfields_name, $lead, 'text')=="Femenino")
 <div class="x-element">
    <div class="x-each">
            <div class="x-title"><span class="x-highlight">¿Esta embarazada?</span></div>

            <div class="x-content">
                {{ customFieldValue('lead_custom_field_11', $lead, 'text') }}
            </div>
    </div>
</div>
<div class="x-element">
    <div class="x-each">           
             <div class="x-title"><span class="x-highlight">Meses de embarazo</span></div>

            <div class="x-content">
                {{ customFieldValue('lead_custom_field_12', $lead, 'text') }}
            </div>
    </div>
</div>        
@endif
@endforeach