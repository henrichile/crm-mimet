<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class InformesExport implements FromView
{
    
    
    private $estadoleads;
    private $usuariolead;
    private $mesdesde;
    private $yeardesde;
    private $meshasta;
    private $yearhasta;

    public function __construct(string $estadoleads,string $usuariolead, string $mesdesde, string $yeardesde, string $meshasta, string $yearhasta )
    {
        $this->estadoleads  =   $estadoleads;
        $this->usuariolead  =   $usuariolead;
        $this->mesdesde     =   $mesdesde;
        $this->yeardesde    =   $yeardesde;
        $this->meshasta     =   $meshasta;
        $this->yearhasta    =   $yearhasta;
    }
    
    
    public function view(): View
    {
        if($this->estadoleads=="Todos" && $this->usuariolead=="Todos"){
            $leads = DB::table('leads')
            ->join('leads_status', 'leads_status.leadstatus_id', '=', 'leads.lead_status')
            ->join('leads_assigned', 'leads_assigned.leadsassigned_leadid', '=', 'leads.lead_id')
            ->join('users', 'users.id', '=', 'leads_assigned.leadsassigned_userid')
            ->select(
                'leads.lead_id',
                'leads.lead_firstname',
                'leads.lead_lastname',
                'leads.lead_materno',
                'leads.lead_custom_field_5',
                'leads.lead_email',
                'leads.lead_phone',
                'leads.lead_source',
                'leads.lead_title',
                'leads.lead_description',
                'leads.lead_value',
                'leads.lead_custom_field_1',
                'leads.lead_custom_field_2',
                'leads.lead_custom_field_3',
                'leads.lead_custom_field_4',
                'leads.lead_custom_field_5',
                'leads.lead_custom_field_7',
                'leads.lead_custom_field_8',
                'leads.lead_custom_field_9',
                'leads_status.leadstatus_title',
                'users.id as idInstructor',
                'users.first_name as nombreInstructor',
                'users.last_name as apellidoInstructor',
                'leads.lead_created',
                'leads.lead_updated')
             ->whereRaw('(MONTH(leads.lead_created)>=? and YEAR(leads.lead_created)>=?) and (MONTH(leads.lead_created)<=? and YEAR(leads.lead_created)<=?)', 
             [$this->mesdesde, $this->yeardesde,$this->meshasta,$this->yearhasta])
            ->get();
}else if($this->estadoleads<>"Todos" && $this->usuariolead=="Todos"){
     $leads = DB::table('leads')
            ->join('leads_status', 'leads_status.leadstatus_id', '=', 'leads.lead_status')
            ->join('leads_assigned', 'leads_assigned.leadsassigned_leadid', '=', 'leads.lead_id')
            ->join('users', 'users.id', '=', 'leads_assigned.leadsassigned_userid')
            ->select(
                'leads.lead_id',
                'leads.lead_firstname',
                'leads.lead_lastname',
                'leads.lead_materno',
                'leads.lead_custom_field_5',
                'leads.lead_email',
                'leads.lead_phone',
                'leads.lead_source',
                'leads.lead_title',
                'leads.lead_description',
                'leads.lead_value',
                'leads.lead_custom_field_1',
                'leads.lead_custom_field_2',
                'leads.lead_custom_field_3',
                'leads.lead_custom_field_4',
                'leads.lead_custom_field_5',
                'leads.lead_custom_field_7',
                'leads.lead_custom_field_8',
                'leads.lead_custom_field_9',
                'leads_status.leadstatus_title',
                'users.id as idInstructor',
                'users.first_name as nombreInstructor',
                'users.last_name as apellidoInstructor',
                'leads.lead_created',
                'leads.lead_updated')
             ->whereRaw('(MONTH(leads.lead_created)>=? and YEAR(leads.lead_created)>=?) and (MONTH(leads.lead_created)<=? and YEAR(leads.lead_created)<=?) and leads.lead_status=?', 
             [$this->mesdesde, $this->yeardesde,$this->meshasta,$this->yearhasta,$this->estadoleads])
            ->get();
}else if($this->estadoleads=="Todos" && $this->usuariolead<>"Todos"){
     $leads = DB::table('leads')
            ->join('leads_status', 'leads_status.leadstatus_id', '=', 'leads.lead_status')
            ->join('leads_assigned', 'leads_assigned.leadsassigned_leadid', '=', 'leads.lead_id')
            ->join('users', 'users.id', '=', 'leads_assigned.leadsassigned_userid')
            ->select(
                'leads.lead_id',
                'leads.lead_firstname',
                'leads.lead_lastname',
                'leads.lead_materno',
                'leads.lead_custom_field_5',
                'leads.lead_email',
                'leads.lead_phone',
                'leads.lead_source',
                'leads.lead_title',
                'leads.lead_description',
                'leads.lead_value',
                'leads.lead_custom_field_1',
                'leads.lead_custom_field_2',
                'leads.lead_custom_field_3',
                'leads.lead_custom_field_4',
                'leads.lead_custom_field_5',
                'leads.lead_custom_field_7',
                'leads.lead_custom_field_8',
                'leads.lead_custom_field_9',
                'leads_status.leadstatus_title',
                'leads_assigned.leadsassigned_userid',
                'leads_assigned.leadsassigned_leadid',
                'users.id as idInstructor',
                'users.first_name as nombreInstructor',
                'users.last_name as apellidoInstructor',
                'leads.lead_created',
                'leads.lead_updated')
             ->whereRaw('(MONTH(leads.lead_created)>=? and YEAR(leads.lead_created)>=?) and (MONTH(leads.lead_created)<=? and YEAR(leads.lead_created)<=? and leads_assigned.leadsassigned_userid=?)', 
             [$this->mesdesde, $this->yeardesde,$this->meshasta,$this->yearhasta,$this->usuariolead])
            ->get();
}else{
     $leads = DB::table('leads')
            ->join('leads_status', 'leads_status.leadstatus_id', '=', 'leads.lead_status')
            ->join('leads_assigned', 'leads_assigned.leadsassigned_leadid', '=', 'leads.lead_id')
            ->join('users', 'users.id', '=', 'leads_assigned.leadsassigned_userid')
            ->select(
                'leads.lead_id',
                'leads.lead_firstname',
                'leads.lead_lastname',
                'leads.lead_materno',
                'leads.lead_custom_field_5',
                'leads.lead_email',
                'leads.lead_phone',
                'leads.lead_source',
                'leads.lead_title',
                'leads.lead_description',
                'leads.lead_value',
                'leads.lead_custom_field_1',
                'leads.lead_custom_field_2',
                'leads.lead_custom_field_3',
                'leads.lead_custom_field_4',
                'leads.lead_custom_field_5',
                'leads.lead_custom_field_7',
                'leads.lead_custom_field_8',
                'leads.lead_custom_field_9',
                'leads_status.leadstatus_title',
                'leads_assigned.leadsassigned_userid',
                'leads_assigned.leadsassigned_leadid',
                'users.id as idInstructor',
                'users.first_name as nombreInstructor',
                'users.last_name as apellidoInstructor',
                'leads.lead_created',
                'leads.lead_updated')
             ->whereRaw('(MONTH(leads.lead_created)>=? and YEAR(leads.lead_created)>=?) and (MONTH(leads.lead_created)<=? and YEAR(leads.lead_created)<=?) and leads.lead_status=? and leads_assigned.leadsassigned_userid=?', 
             [$this->mesdesde, $this->yeardesde,$this->meshasta,$this->yearhasta,$this->estadoleads,$this->usuariolead])
            ->get();
}
        
        
        return view('pages.reportes.exportar', [
            'leads' => $leads
        ]);
    }
}