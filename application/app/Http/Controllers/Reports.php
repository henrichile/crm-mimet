<?php

/** --------------------------------------------------------------------------------
 * This controller manages all the business logic for reports
 *
 * @package    Grow CRM
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\InformesExport;
use Maatwebsite\Excel\Facades\Excel;

class Reports extends Controller {


    public function __construct() {
        
        //parent
        parent::__construct();
                
       //authenticated
        $this->middleware('auth');
    }
    

    /**
     * show main page
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        //crumbs, page data & stats
        $page = $this->pageSettings('reports');
        $stats = $this->statsWidget(array());
         $estados=DB::table('leads_status')->orderBy('leadstatus_position','ASC')->get();
         //var_dump($estados);
         $total=0;
         foreach($estados as $item){
           $status[$item->leadstatus_id] = DB::table('leads')->where('lead_status', '=',$item->leadstatus_id)->get();
           $total=$total+count($status[$item->leadstatus_id]);
         }
         
         $usuarios=DB::table('users')->get();


        

        //render page
        return view('pages.reportes.reports', compact('page', 'stats','status','estados','total','usuarios'));
    }

    /**
     * basic page setting for this section of the app
     * @param string $section page section (optional)
     * @param array $data any other data (optional)
     * @return array
     */
    private function pageSettings($section = '', $data = []) {

        $page = array();

        $page = [
            'crumbs' => [
            ],
            'crumbs_special_class' => 'list-pages-crumbs',
            'page' => 'reports',
        ];
        return $page;
    }

    /**
     * data for the stats widget
     * $section string required
     * $data array optional payload data
     * @return array
     */
    private function statsWidget($data = array()) {

        $stats = array();
        
        
       
        
        

        //return
        return $stats;
    }
    
     public function exportar(Request $request) {
         $datos=$request->all();
         
         /* $sql="SELECT leads.lead_firstname,leads.lead_lastname,leads.lead_materno,leads.lead_custom_field_5,leads.lead_email,leads.lead_phone,leads.lead_source,leads.lead_title,leads.lead_description,leads.lead_value,leads.lead_custom_field_1,leads.lead_custom_field_2,leads_status .leadstatus_title,leads.lead_created,leads.lead_updated FROM leads a
INNER JOIN leads_status b on b.leadstatus_id=a.lead_status
WHERE (MONTH(a.lead_created)>='10' and YEAR(a.lead_created)>='2021') and (MONTH(a.lead_created)<='10' and YEAR(a.lead_created)<='2021')";*/
//             ->join('leads_assigned', 'leads_assigned.leadsassigned_leadid','=', 'leads.lead_id')
//dd( $datos);
/*
if($datos["estadoleads"]=="Todos" && $datos["usuariolead"]=="Todos"){
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
                'leads_status.leadstatus_title',
                'users.id as idInstructor',
                'users.first_name as nombreInstructor',
                'users.last_name as apellidoInstructor',
                'leads.lead_created',
                'leads.lead_updated')
             ->whereRaw('(MONTH(leads.lead_created)>=? and YEAR(leads.lead_created)>=?) and (MONTH(leads.lead_created)<=? and YEAR(leads.lead_created)<=?)', 
             [$datos["mesdesde"], $datos["yeardesde"],$datos["meshasta"],$datos["yearhasta"]])
            ->get();
}else if($datos["estadoleads"]<>"Todos" && $datos["usuariolead"]=="Todos"){
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
                'leads_status.leadstatus_title',
                'users.id as idInstructor',
                'users.first_name as nombreInstructor',
                'users.last_name as apellidoInstructor',
                'leads.lead_created',
                'leads.lead_updated')
             ->whereRaw('(MONTH(leads.lead_created)>=? and YEAR(leads.lead_created)>=?) and (MONTH(leads.lead_created)<=? and YEAR(leads.lead_created)<=?) and leads.lead_status=?', 
             [$datos["mesdesde"], $datos["yeardesde"],$datos["meshasta"],$datos["yearhasta"],$datos["estadoleads"]])
            ->get();
}else if($datos["estadoleads"]=="Todos" && $datos["usuariolead"]<>"Todos"){
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
                'leads_status.leadstatus_title',
                'leads_assigned.leadsassigned_userid',
                'leads_assigned.leadsassigned_leadid',
                'users.id as idInstructor',
                'users.first_name as nombreInstructor',
                'users.last_name as apellidoInstructor',
                'leads.lead_created',
                'leads.lead_updated')
             ->whereRaw('(MONTH(leads.lead_created)>=? and YEAR(leads.lead_created)>=?) and (MONTH(leads.lead_created)<=? and YEAR(leads.lead_created)<=? and leads_assigned.leadsassigned_userid=?)', 
             [$datos["mesdesde"], $datos["yeardesde"],$datos["meshasta"],$datos["yearhasta"],$datos["usuariolead"]])
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
                'leads_status.leadstatus_title',
                'leads_assigned.leadsassigned_userid',
                'leads_assigned.leadsassigned_leadid',
                'users.id as idInstructor',
                'users.first_name as nombreInstructor',
                'users.last_name as apellidoInstructor',
                'leads.lead_created',
                'leads.lead_updated')
             ->whereRaw('(MONTH(leads.lead_created)>=? and YEAR(leads.lead_created)>=?) and (MONTH(leads.lead_created)<=? and YEAR(leads.lead_created)<=?) and leads.lead_status=? and leads_assigned.leadsassigned_userid=?', 
             [$datos["mesdesde"], $datos["yeardesde"],$datos["meshasta"],$datos["yearhasta"],$datos["estadoleads"],$datos["usuariolead"]])
            ->get();
}*/

          return Excel::download(new InformesExport($datos["estadoleads"],$datos["usuariolead"],$datos["mesdesde"], $datos["yeardesde"],$datos["meshasta"],$datos["yearhasta"]), 'leads_'.time().'.xlsx');
          //return view('pages.reportes.exportar', compact('datos','leads'));
    }
    
    
}