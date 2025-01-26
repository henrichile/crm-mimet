<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Responses\Clients\CommonResponse;
use App\Http\Responses\Clients\CreateResponse;
use App\Http\Responses\Clients\DestroyResponse;
use App\Http\Responses\Clients\EditLogoResponse;
use App\Http\Responses\Clients\EditResponse;
use App\Http\Responses\Clients\IndexResponse;
use App\Http\Responses\Clients\ShowDynamicResponse;
use App\Http\Responses\Clients\ShowResponse;
use App\Http\Responses\Clients\StoreResponse;
use App\Http\Responses\Clients\UpdateResponse;
use App\Repositories\AttachmentRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ClientRepository;
use App\Repositories\DestroyRepository;
use App\Repositories\TagRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Clients\ClientStoreValidation;
use Validator;

class Externos extends Controller {

    public function productos(Request $request) {
        $data=request(); 

        $sede=cursos($data['sede']);
        $curso=$data['curso'];
        
        $html='<input type="hidden" name="cursox" id="cursox" value="'.$curso.'"><select name="lead_custom_field_1" id="lead_custom_field_1" class="form-control form-control-sm"><option value="">Seleccione</option>';
      if(count($sede)>0){
        foreach($sede as $item){         
            if($item->Nombre==$curso){
                $activo='selected="selected"';
            }else{
                $activo='';
            }
            $html.='<option value="'.$item->Nombre.'" '.$activo.'>'.$item->Nombre.'</option>';
        }
      }
        $html.='</select>';
        
        
        //show views
        return $html;
    }
    
    
}
