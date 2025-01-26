<?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="form-group row m-b-8">
     <?php if($field->customfields_name!='lead_custom_field_11' && $field->customfields_name!='lead_custom_field_12'): ?>
    <label
        class="col-sm-12 text-left control-label col-form-label font-13 p-b-1 <?php echo e(runtimeCustomFieldsRequiredCSS($field->customfields_required)); ?>">
        <?php echo e($field->customfields_title); ?><?php echo e(runtimeCustomFieldsRequiredAsterix($field->customfields_required)); ?></label>
    <?php endif; ?>    
    <div class="col-sm-12">
                <?php if($field->customfields_name=='lead_custom_field_3'): ?>
            <select name="<?php echo e($field->customfields_name); ?>" id="<?php echo e($field->customfields_name); ?>" class="form-control form-control-sm" onchange="javascript:sexo(this.value)">
                 <option value="" <?php if(customFieldValue($field->customfields_name, $lead, 'form')==''): ?> selected="selected" <?php endif; ?>>Seleccione</option>
                <option value="Masculino" <?php if(customFieldValue($field->customfields_name, $lead, 'form')=='Masculino'): ?> selected="selected" <?php endif; ?>>Masculino</option>
                <option value="Femenino" <?php if(customFieldValue($field->customfields_name, $lead, 'form')=='Femenino'): ?> selected="selected" <?php endif; ?>>Femenino</option>
            </select>
            
            
            
        <?php elseif($field->customfields_name=='lead_custom_field_2'): ?>
            <select name="<?php echo e($field->customfields_name); ?>" id="<?php echo e($field->customfields_name); ?>" class="form-control form-control-sm" onchange="javascript:traeCursos(this.value)">
                 <option value="" <?php if(customFieldValue($field->customfields_name, $lead, 'form')==''): ?> selected="selected" <?php endif; ?>>Seleccione</option>
                <option value="Santiago Centro" <?php if(customFieldValue($field->customfields_name, $lead, 'form')=='Santiago Centro'): ?> selected="selected" <?php endif; ?>>Santiago Centro</option>
                <option value="Vitacura" <?php if(customFieldValue($field->customfields_name, $lead, 'form')=='Vitacura'): ?> selected="selected" <?php endif; ?>>Vitacura</option>
                <option value="La Cisterna" <?php if(customFieldValue($field->customfields_name, $lead, 'form')=='La Cisterna'): ?> selected="selected" <?php endif; ?>>La Cisterna</option>
                <option value="Curacavi" <?php if(customFieldValue($field->customfields_name, $lead, 'form')=='Curacavi'): ?> selected="selected" <?php endif; ?>>Curacaví</option>
                <option value="Intensivo" <?php if(customFieldValue($field->customfields_name, $lead, 'form')=='Intensivo'): ?> selected="selected" <?php endif; ?>>Intensivo</option>
                <option value="La Reina" <?php if(customFieldValue($field->customfields_name, $lead, 'form')=='La Reina'): ?> selected="selected" <?php endif; ?>>La Reina</option>
                
            </select>    
        <?php elseif($field->customfields_name=='lead_custom_field_1'): ?>
        <div id="mosprod">
             <input type="hidden" name="cursox" id="cursox" value="<?php echo e(customFieldValue($field->customfields_name, $lead, 'form')); ?>">
            <select name="<?php echo e($field->customfields_name); ?>" id="<?php echo e($field->customfields_name); ?>" class="form-control form-control-sm">
                 <option value="" <?php if(customFieldValue($field->customfields_name, $lead, 'form')==''): ?> selected="selected" <?php endif; ?>>Seleccione</option>
            </select> 
        </div>
        <?php elseif($field->customfields_name=='lead_custom_field_9'): ?>
            <select name="<?php echo e($field->customfields_name); ?>" id="<?php echo e($field->customfields_name); ?>" class="form-control form-control-sm">
                 <option value="" <?php if(customFieldValue($field->customfields_name, $lead, 'form')==''): ?> selected="selected" <?php endif; ?>>Seleccione</option>
                <option value="si" <?php if(customFieldValue($field->customfields_name, $lead, 'form')=='si'): ?> selected="selected" <?php endif; ?>>Si</option>
                <option value="no" <?php if(customFieldValue($field->customfields_name, $lead, 'form')=='no'): ?> selected="selected" <?php endif; ?>>No</option>
            </select>
        
         <?php elseif($field->customfields_name=='lead_custom_field_6'): ?>
           <?php
             //$nacionalidad=nacionalidades();
      $nacionalidades='[{"Nombre":"Afganist\u00e1n"},{"Nombre":"Afganist\u00e1n"},{"Nombre":"Albania"},{"Nombre":"Albania"},{"Nombre":"Alemania"},{"Nombre":"Alemania"},{"Nombre":"Algeria"},{"Nombre":"Algeria"},{"Nombre":"Andorra"},{"Nombre":"Andorra"},{"Nombre":"Angola"},{"Nombre":"Angola"},{"Nombre":"Anguilla"},{"Nombre":"Anguilla"},{"Nombre":"Antigua y Barbuda"},{"Nombre":"Antigua y Barbuda"},{"Nombre":"Antillas Holandesas"},{"Nombre":"Antillas Holandesas"},{"Nombre":"Arabia Saudita"},{"Nombre":"Arabia Saudita"},{"Nombre":"Argentina"},{"Nombre":"Argentina"},{"Nombre":"Armenia"},{"Nombre":"Armenia"},{"Nombre":"Aruba"},{"Nombre":"Aruba"},{"Nombre":"Australia"},{"Nombre":"Australia"},{"Nombre":"Austria"},{"Nombre":"Austria"},{"Nombre":"Azerbaiy\u00e1n"},{"Nombre":"Azerbaiy\u00e1n"},{"Nombre":"Bahamas"},{"Nombre":"Bahamas"},{"Nombre":"Bahrein"},{"Nombre":"Bahrein"},{"Nombre":"Bangladesh"},{"Nombre":"Bangladesh"},{"Nombre":"Barbados"},{"Nombre":"Barbados"},{"Nombre":"B\u00e9lgica"},{"Nombre":"B\u00e9lgica"},{"Nombre":"Belice"},{"Nombre":"Belice"},{"Nombre":"Ben\u00edn"},{"Nombre":"Ben\u00edn"},{"Nombre":"Bermudas"},{"Nombre":"Bermudas"},{"Nombre":"Bielorrusia"},{"Nombre":"Bielorrusia"},{"Nombre":"Bolivia"},{"Nombre":"Bolivia"},{"Nombre":"Bosnia y Herzegovina"},{"Nombre":"Bosnia y Herzegovina"},{"Nombre":"Botsuana"},{"Nombre":"Botsuana"},{"Nombre":"Brasil"},{"Nombre":"Brasil"},{"Nombre":"Brun\u00e9i"},{"Nombre":"Brun\u00e9i"},{"Nombre":"Bulgaria"},{"Nombre":"Bulgaria"},{"Nombre":"Burkina Faso"},{"Nombre":"Burkina Faso"},{"Nombre":"Burundi"},{"Nombre":"Burundi"},{"Nombre":"But\u00e1n"},{"Nombre":"But\u00e1n"},{"Nombre":"Cabo Verde"},{"Nombre":"Cabo Verde"},{"Nombre":"Camboya"},{"Nombre":"Camboya"},{"Nombre":"Camer\u00fan"},{"Nombre":"Camer\u00fan"},{"Nombre":"Canad\u00e1"},{"Nombre":"Canad\u00e1"},{"Nombre":"Chad"},{"Nombre":"Chad"},{"Nombre":"Chile"},{"Nombre":"Chile"},{"Nombre":"China"},{"Nombre":"China"},{"Nombre":"Chipre"},{"Nombre":"Chipre"},{"Nombre":"Colombia"},{"Nombre":"Colombia"},{"Nombre":"Comores"},{"Nombre":"Comores"},{"Nombre":"Congo (Brazzaville)"},{"Nombre":"Congo (Brazzaville)"},{"Nombre":"Congo (Kinshasa)"},{"Nombre":"Congo (Kinshasa)"},{"Nombre":"Cook, Islas"},{"Nombre":"Cook, Islas"},{"Nombre":"Corea del Norte"},{"Nombre":"Corea del Norte"},{"Nombre":"Corea del Sur"},{"Nombre":"Corea del Sur"},{"Nombre":"Costa de Marfil"},{"Nombre":"Costa de Marfil"},{"Nombre":"Costa Rica"},{"Nombre":"Costa Rica"},{"Nombre":"Croacia"},{"Nombre":"Croacia"},{"Nombre":"Cuba"},{"Nombre":"Cuba"},{"Nombre":"Dinamarca"},{"Nombre":"Dinamarca"},{"Nombre":"Djibouti, Yibuti"},{"Nombre":"Djibouti, Yibuti"},{"Nombre":"Ecuador"},{"Nombre":"Ecuador"},{"Nombre":"Egipto"},{"Nombre":"Egipto"},{"Nombre":"El Salvador"},{"Nombre":"El Salvador"},{"Nombre":"Emiratos \u00e1rabes Unidos"},{"Nombre":"Emiratos \u00e1rabes Unidos"},{"Nombre":"Eritrea"},{"Nombre":"Eritrea"},{"Nombre":"Eslovaquia"},{"Nombre":"Eslovaquia"},{"Nombre":"Eslovenia"},{"Nombre":"Eslovenia"},{"Nombre":"Espa\u00f1a"},{"Nombre":"Espa\u00f1a"},{"Nombre":"Estados Unidos"},{"Nombre":"Estados Unidos"},{"Nombre":"Estonia"},{"Nombre":"Estonia"},{"Nombre":"Etiop\u00eda"},{"Nombre":"Etiop\u00eda"},{"Nombre":"Feroe, Islas"},{"Nombre":"Feroe, Islas"},{"Nombre":"Filipinas"},{"Nombre":"Filipinas"},{"Nombre":"Finlandia"},{"Nombre":"Finlandia"},{"Nombre":"Fiyi"},{"Nombre":"Fiyi"},{"Nombre":"Francia"},{"Nombre":"Francia"},{"Nombre":"Gab\u00f3n"},{"Nombre":"Gab\u00f3n"},{"Nombre":"Gambia"},{"Nombre":"Gambia"},{"Nombre":"Georgia"},{"Nombre":"Georgia"},{"Nombre":"Ghana"},{"Nombre":"Ghana"},{"Nombre":"Gibraltar"},{"Nombre":"Gibraltar"},{"Nombre":"Granada"},{"Nombre":"Granada"},{"Nombre":"Grecia"},{"Nombre":"Grecia"},{"Nombre":"Groenlandia"},{"Nombre":"Groenlandia"},{"Nombre":"Guadalupe"},{"Nombre":"Guadalupe"},{"Nombre":"Guatemala"},{"Nombre":"Guatemala"},{"Nombre":"Guernsey"},{"Nombre":"Guernsey"},{"Nombre":"Guinea"},{"Nombre":"Guinea"},{"Nombre":"Guinea Ecuatorial"},{"Nombre":"Guinea Ecuatorial"},{"Nombre":"Guinea-Bissau"},{"Nombre":"Guinea-Bissau"},{"Nombre":"Guyana"},{"Nombre":"Guyana"},{"Nombre":"Haiti"},{"Nombre":"Haiti"},{"Nombre":"Honduras"},{"Nombre":"Honduras"},{"Nombre":"Hong Kong"},{"Nombre":"Hong Kong"},{"Nombre":"Hungr\u00eda"},{"Nombre":"Hungr\u00eda"},{"Nombre":"India"},{"Nombre":"India"},{"Nombre":"Indonesia"},{"Nombre":"Indonesia"},{"Nombre":"Irak"},{"Nombre":"Irak"},{"Nombre":"Ir\u00e1n"},{"Nombre":"Ir\u00e1n"},{"Nombre":"Irlanda"},{"Nombre":"Irlanda"},{"Nombre":"Isla Pitcairn"},{"Nombre":"Isla Pitcairn"},{"Nombre":"Islandia"},{"Nombre":"Islandia"},{"Nombre":"Islas Salom\u00f3n"},{"Nombre":"Islas Salom\u00f3n"},{"Nombre":"Islas Turcas y Caicos"},{"Nombre":"Islas Turcas y Caicos"},{"Nombre":"Islas Virgenes Brit\u00e1nicas"},{"Nombre":"Islas Virgenes Brit\u00e1nicas"},{"Nombre":"Israel"},{"Nombre":"Israel"},{"Nombre":"Italia"},{"Nombre":"Italia"},{"Nombre":"Jamaica"},{"Nombre":"Jamaica"},{"Nombre":"Jap\u00f3n"},{"Nombre":"Jap\u00f3n"},{"Nombre":"Jersey"},{"Nombre":"Jersey"},{"Nombre":"Jordania"},{"Nombre":"Jordania"},{"Nombre":"Kazajst\u00e1n"},{"Nombre":"Kazajst\u00e1n"},{"Nombre":"Kenia"},{"Nombre":"Kenia"},{"Nombre":"Kirguist\u00e1n"},{"Nombre":"Kirguist\u00e1n"},{"Nombre":"Kiribati"},{"Nombre":"Kiribati"},{"Nombre":"Kuwait"},{"Nombre":"Kuwait"},{"Nombre":"Laos"},{"Nombre":"Laos"},{"Nombre":"Lesotho"},{"Nombre":"Lesotho"},{"Nombre":"Letonia"},{"Nombre":"Letonia"},{"Nombre":"L\u00edbano"},{"Nombre":"L\u00edbano"},{"Nombre":"Liberia"},{"Nombre":"Liberia"},{"Nombre":"Libia"},{"Nombre":"Libia"},{"Nombre":"Liechtenstein"},{"Nombre":"Liechtenstein"},{"Nombre":"Lituania"},{"Nombre":"Lituania"},{"Nombre":"Luxemburgo"},{"Nombre":"Luxemburgo"},{"Nombre":"Macedonia"},{"Nombre":"Macedonia"},{"Nombre":"Madagascar"},{"Nombre":"Madagascar"},{"Nombre":"Malasia"},{"Nombre":"Malasia"},{"Nombre":"Malawi"},{"Nombre":"Malawi"},{"Nombre":"Maldivas"},{"Nombre":"Maldivas"},{"Nombre":"Mal\u00ed"},{"Nombre":"Mal\u00ed"},{"Nombre":"Malta"},{"Nombre":"Malta"},{"Nombre":"Man, Isla de"},{"Nombre":"Man, Isla de"},{"Nombre":"Marruecos"},{"Nombre":"Marruecos"},{"Nombre":"Martinica"},{"Nombre":"Martinica"},{"Nombre":"Mauricio"},{"Nombre":"Mauricio"},{"Nombre":"Mauritania"},{"Nombre":"Mauritania"},{"Nombre":"M\u00e9xico"},{"Nombre":"M\u00e9xico"},{"Nombre":"Moldavia"},{"Nombre":"Moldavia"},{"Nombre":"M\u00f3naco"},{"Nombre":"M\u00f3naco"},{"Nombre":"Mongolia"},{"Nombre":"Mongolia"},{"Nombre":"Mozambique"},{"Nombre":"Mozambique"},{"Nombre":"Myanmar"},{"Nombre":"Myanmar"},{"Nombre":"Namibia"},{"Nombre":"Namibia"},{"Nombre":"Nauru"},{"Nombre":"Nauru"},{"Nombre":"Nepal"},{"Nombre":"Nepal"},{"Nombre":"Nicaragua"},{"Nombre":"Nicaragua"},{"Nombre":"N\u00edger"},{"Nombre":"N\u00edger"},{"Nombre":"Nigeria"},{"Nombre":"Nigeria"},{"Nombre":"Norfolk Island"},{"Nombre":"Norfolk Island"},{"Nombre":"Noruega"},{"Nombre":"Noruega"},{"Nombre":"Nueva Caledonia"},{"Nombre":"Nueva Caledonia"},{"Nombre":"Nueva Zelanda"},{"Nombre":"Nueva Zelanda"},{"Nombre":"Om\u00e1n"},{"Nombre":"Om\u00e1n"},{"Nombre":"Pa\u00edses Bajos, Holanda"},{"Nombre":"Pa\u00edses Bajos, Holanda"},{"Nombre":"Pakist\u00e1n"},{"Nombre":"Pakist\u00e1n"},{"Nombre":"Panam\u00e1"},{"Nombre":"Panam\u00e1"},{"Nombre":"Pap\u00faa-Nueva Guinea"},{"Nombre":"Pap\u00faa-Nueva Guinea"},{"Nombre":"Paraguay"},{"Nombre":"Paraguay"},{"Nombre":"Per\u00fa"},{"Nombre":"Per\u00fa"},{"Nombre":"Polinesia Francesa"},{"Nombre":"Polinesia Francesa"},{"Nombre":"Polonia"},{"Nombre":"Polonia"},{"Nombre":"Portugal"},{"Nombre":"Portugal"},{"Nombre":"Puerto Rico"},{"Nombre":"Puerto Rico"},{"Nombre":"Qatar"},{"Nombre":"Qatar"},{"Nombre":"Reino Unido"},{"Nombre":"Reino Unido"},{"Nombre":"Rep\u00fablica Checa"},{"Nombre":"Rep\u00fablica Checa"},{"Nombre":"Rep\u00fablica Dominicana"},{"Nombre":"Rep\u00fablica Dominicana"},{"Nombre":"Reuni\u00f3n"},{"Nombre":"Reuni\u00f3n"},{"Nombre":"Ruanda"},{"Nombre":"Ruanda"},{"Nombre":"Ruman\u00eda"},{"Nombre":"Ruman\u00eda"},{"Nombre":"Rusia"},{"Nombre":"Rusia"},{"Nombre":"S\u00e1hara Occidental"},{"Nombre":"S\u00e1hara Occidental"},{"Nombre":"Samoa"},{"Nombre":"Samoa"},{"Nombre":"San Cristobal y Nevis"},{"Nombre":"San Cristobal y Nevis"},{"Nombre":"San Marino"},{"Nombre":"San Marino"},{"Nombre":"San Pedro y Miquel\u00f3n"},{"Nombre":"San Pedro y Miquel\u00f3n"},{"Nombre":"San Tom\u00e9 y Pr\u00edncipe"},{"Nombre":"San Tom\u00e9 y Pr\u00edncipe"},{"Nombre":"San Vincente y Granadinas"},{"Nombre":"San Vincente y Granadinas"},{"Nombre":"Santa Elena"},{"Nombre":"Santa Elena"},{"Nombre":"Santa Luc\u00eda"},{"Nombre":"Santa Luc\u00eda"},{"Nombre":"Senegal"},{"Nombre":"Senegal"},{"Nombre":"Serbia y Montenegro"},{"Nombre":"Serbia y Montenegro"},{"Nombre":"Seychelles"},{"Nombre":"Seychelles"},{"Nombre":"Sierra Leona"},{"Nombre":"Sierra Leona"},{"Nombre":"Singapur"},{"Nombre":"Singapur"},{"Nombre":"Siria"},{"Nombre":"Siria"},{"Nombre":"Somalia"},{"Nombre":"Somalia"},{"Nombre":"Sri Lanka"},{"Nombre":"Sri Lanka"},{"Nombre":"Sud\u00e1frica"},{"Nombre":"Sud\u00e1frica"},{"Nombre":"Sud\u00e1n"},{"Nombre":"Sud\u00e1n"},{"Nombre":"Suecia"},{"Nombre":"Suecia"},{"Nombre":"Suiza"},{"Nombre":"Suiza"},{"Nombre":"Surinam"},{"Nombre":"Surinam"},{"Nombre":"Swazilandia"},{"Nombre":"Swazilandia"},{"Nombre":"Tadjikistan"},{"Nombre":"Tadjikistan"},{"Nombre":"Tailandia"},{"Nombre":"Tailandia"},{"Nombre":"Taiwan"},{"Nombre":"Taiwan"},{"Nombre":"Tanzania"},{"Nombre":"Tanzania"},{"Nombre":"Timor Oriental"},{"Nombre":"Timor Oriental"},{"Nombre":"Togo"},{"Nombre":"Togo"},{"Nombre":"Tokelau"},{"Nombre":"Tokelau"},{"Nombre":"Tonga"},{"Nombre":"Tonga"},{"Nombre":"Trinidad y Tobago"},{"Nombre":"Trinidad y Tobago"},{"Nombre":"T\u00fanez"},{"Nombre":"T\u00fanez"},{"Nombre":"Turkmenistan"},{"Nombre":"Turkmenistan"},{"Nombre":"Turqu\u00eda"},{"Nombre":"Turqu\u00eda"},{"Nombre":"Tuvalu"},{"Nombre":"Tuvalu"},{"Nombre":"Ucrania"},{"Nombre":"Ucrania"},{"Nombre":"Uganda"},{"Nombre":"Uganda"},{"Nombre":"Uruguay"},{"Nombre":"Uruguay"},{"Nombre":"Uzbekist\u00e1n"},{"Nombre":"Uzbekist\u00e1n"},{"Nombre":"Vanuatu"},{"Nombre":"Vanuatu"},{"Nombre":"Venezuela"},{"Nombre":"Venezuela"},{"Nombre":"Vietnam"},{"Nombre":"Vietnam"},{"Nombre":"Wallis y Futuna"},{"Nombre":"Wallis y Futuna"},{"Nombre":"Yemen"},{"Nombre":"Yemen"},{"Nombre":"Zambia"},{"Nombre":"Zambia"},{"Nombre":"Zimbabwe"},{"Nombre":"Zimbabwe"}]';
      $nacionalidad=json_decode($nacionalidades);
      
           ?>
         
            <select name="<?php echo e($field->customfields_name); ?>" id="<?php echo e($field->customfields_name); ?>" class="form-control form-control-sm">
                 <option value="" <?php if(customFieldValue($field->customfields_name, $lead, 'form')==''): ?> selected="selected" <?php endif; ?>>Seleccione</option>
                 
                <?php $__currentLoopData = $nacionalidad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                <option value="<?php echo e($item->Nombre); ?>" <?php if(customFieldValue($field->customfields_name, $lead, 'form')==$item->Nombre): ?> selected="selected" <?php endif; ?>><?php echo e($item->Nombre); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        <?php elseif($field->customfields_name=='lead_custom_field_11' || $field->customfields_name=='lead_custom_field_12'): ?>
           
        <?php else: ?>
        <input type="text" class="form-control form-control-sm <?php if($field->customfields_name=='lead_custom_field_4'): ?>  card-pickadate <?php endif; ?>" id="<?php echo e($field->customfields_name); ?>"
            name="<?php echo e($field->customfields_name); ?>"
            value="<?php echo e(customFieldValue($field->customfields_name, $lead, 'form')); ?>">
        <?php endif; ?>
    </div>
     <?php if($field->customfields_name=='lead_custom_field_3'): ?>
     
     <div id="mostemb" <?php if(customFieldValue('lead_custom_field_3', $lead, 'form')=='no'): ?> style="display:none !important" <?php endif; ?>>
          <label
            class="col-sm-12 text-left control-label col-form-label font-13 p-b-1 <?php echo e(runtimeCustomFieldsRequiredCSS($field->customfields_required)); ?>">
              ¿Esta embarazada?
          </label>
         <div class="col-sm-12">
             <select name="lead_custom_field_11" id="lead_custom_field_11" class="form-control form-control-sm">
                     <option value="" <?php if(customFieldValue('lead_custom_field_11', $lead, 'form')==''): ?> selected="selected" <?php endif; ?>>Seleccione</option>
                    <option value="si" <?php if(customFieldValue('lead_custom_field_11', $lead, 'form')=="si"): ?> selected="selected" <?php endif; ?>>Si</option>
                    <option value="no" <?php if(customFieldValue('lead_custom_field_11', $lead, 'form')=="no"): ?> selected="selected" <?php endif; ?>>No</option>
                </select>
         </div>   
         <label
            class="col-sm-12 text-left control-label col-form-label font-13 p-b-1 <?php echo e(runtimeCustomFieldsRequiredCSS($field->customfields_required)); ?>">
              Meses de embarazo
          </label>
         <div class="col-sm-12">
             <select name="lead_custom_field_12" id="lead_custom_field_12" class="form-control form-control-sm">
                     <option value="" <?php if(customFieldValue('lead_custom_field_12', $lead, 'form')==''): ?> selected="selected" <?php endif; ?>>Seleccione</option>
                     
                    <?php for($i=1;$i<=9;$i++): ?> 
                    <option value="<?php echo e($i); ?>" <?php if(customFieldValue('lead_custom_field_12', $lead, 'form')==$i): ?> selected="selected" <?php endif; ?>><?php echo e($i); ?></option>
                    <?php endfor; ?>
                </select>
         </div>  
     </div>
     <?php endif; ?>
     
     
    
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/crmhuelen/public_html/application/resources/views/pages/lead/components/custom-fields-edit.blade.php ENDPATH**/ ?>