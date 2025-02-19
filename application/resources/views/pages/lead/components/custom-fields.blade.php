@foreach($fields as $field)

          @if($field->customfields_name!='lead_custom_field_6')
<div class="x-element">
    <div class="x-each">
        
        <div class="x-title"><span class="x-highlight">{{ $field->customfields_title }}</span></div>

        <div class="x-content">
            {{ customFieldValue($field->customfields_name, $lead, 'text') }}
        </div>
    </div>
</div>
 @endif
 @if($field->customfields_name=='lead_custom_field_6')
 <div class="x-element">
    <div class="x-each">
            <div class="x-title"><span class="x-highlight">Link producto</span></div>

            <div class="x-content">
                <a href="{{ customFieldValue('lead_custom_field_6', $lead, 'text') }}" target="_blank">{{ customFieldValue('lead_custom_field_6', $lead, 'text') }}</a>
            </div>
    </div>
</div>     
@endif
@endforeach