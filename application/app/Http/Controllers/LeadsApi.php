<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LeadsApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         if ($last = Lead::orderBy('lead_position', 'desc')->first()) {
            $position = $last->lead_position + config('settings.db_position_increment');
        } else {
            //default position increment
            $position = config('settings.db_position_increment');
        }
        
        
         $data=$request->all();
         $lead= new Lead();
         if(isset($data['formulario'])){
            $lead->lead_title=$data['formulario'];
         }else{
             $lead->lead_title="Formulario Home";
         }
         $lead->lead_firstname=$data['nombre'];
         $lead->lead_lastname=$data['apellido'];
         if(isset($data['telefono'])){
            $lead->lead_phone=$data['telefono'];
         }
         $lead->lead_email=$data['correo'];
         $lead->lead_source=$data['source'];
         if(isset($data['mensaje'])){
         $lead->lead_description=$data['mensaje'];
         }
         if(isset($data['curso'])){
         $lead->lead_custom_field_1=$data['curso'];
         }
         if(isset($data['sede'])){
         $lead->lead_custom_field_2=$data['sede'];
         }
         
         
         
         
         $lead->lead_categoryid=60;
         $lead->lead_position=$position;
         if($lead->save()){
             return response()->json("correcto", 201);
         }else{
             return response()->json("error", 409);
         }
    }
    
    public function storefacebook(Request $request)
    {
        
         if ($last = Lead::orderBy('lead_position', 'desc')->first()) {
            $position = $last->lead_position + config('settings.db_position_increment');
        } else {
            //default position increment
            $position = config('settings.db_position_increment');
        }
        
         $data=$request->all();
         $noms=explode(" ",$data['nombre']);
         $lead= new Lead();
         if(isset($data['campana'])){
         $lead->lead_title=$data['campana'];
         }else{
             $lead->lead_title="Facbook";
         }
         
         $lead->lead_firstname=$noms[0];
         $lead->lead_lastname=$noms[1];
         if(isset($data['telefono'])){
         $lead->lead_phone=$data['telefono'];
         }else{
             $lead->lead_phone=="S. Info.";
         }
         $lead->lead_email=$data['correo'];
         if(isset($data['origen']) && !empty($data['origen'])){
           $lead->lead_source=$data['origen'];
         }else{
             $lead->lead_source=="Facebook";
         }
         $lead->lead_categoryid=60;
         $lead->lead_position=$position;
         if($lead->save()){
             return response()->json("correcto", 201);
         }else{
             return response()->json("error", 409);
         }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
