<?php

/** --------------------------------------------------------------------------------
 * This repository class manages all the data absctration for leads
 *
 * @package    Grow CRM
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Log;

class LeadRepository {

    /**
     * The leads repository instance.
     */
    protected $leads;

    /**
     * Inject dependecies
     */
    public function __construct(Lead $leads) {
        $this->leads = $leads;
    }

    /**
     * Search model
     * @param int $id optional for getting a single, specified record
     * @return object lead collection
     */
    public function search($id = '') {

        $leads = $this->leads->newQuery();

        //joins
        $leads->leftJoin('categories', 'categories.category_id', '=', 'leads.lead_categoryid');
       // $leads->leftJoin('users', 'users.id', '=', 'leads.lead_creatorid');
        $leads->leftJoin('leads_status', 'leads_status.leadstatus_id', '=', 'leads.lead_status');

        // select all
        $leads->selectRaw('*');

        //count unread notifications
        $leads->selectRaw('(SELECT COUNT(*)
                                      FROM events_tracking
                                      LEFT JOIN events ON events.event_id = events_tracking.eventtracking_eventid
                                      WHERE eventtracking_userid = ' . auth()->id() . '
                                      AND events_tracking.eventtracking_status = "unread"
                                      AND events.event_parent_type = "lead"
                                      AND events.eventresource_id = leads.lead_id
                                      AND events.event_item = "comment")
                                      AS count_unread_comments');

        //count unread notifications
        $leads->selectRaw('(SELECT COUNT(*)
                                      FROM events_tracking
                                      LEFT JOIN events ON events.event_id = events_tracking.eventtracking_eventid
                                      WHERE eventtracking_userid = ' . auth()->id() . '
                                      AND events_tracking.eventtracking_status = "unread"
                                      AND events.event_parent_type = "lead"
                                      AND events.event_parent_id = leads.lead_id
                                      AND events.event_item = "attachment")
                                      AS count_unread_attachments');
        //converted by details
        $leads->selectRaw('(SELECT first_name
                                      FROM users
                                      WHERE users.id = leads.lead_converted_by_userid)
                                      AS converted_by_first_name');
        //converted by details
        $leads->selectRaw('(SELECT last_name
                                      FROM users
                                      WHERE users.id = leads.lead_converted_by_userid)
                                      AS converted_by_last_name');
        if(request('dias')){
            $dias=request('dias');
        }else{ 
            $dias=30;
        }
        
        //echo $dias;
        //exit;
                                      
        $hoy=date('y-m-d');
        $newfecha= date("Y-m-d",strtotime($hoy."- ".$dias." days"));

        //default where
        $leads->whereRaw("1 = 1");
        $leads->Where('lead_created', '>=', $newfecha);
        //filter for active or archived (default to active) - do not use this when a lead id has been specified
        if (!is_numeric($id)) {
            if (!request()->filled('filter_show_archived_leads') && !request()->filled('filter_lead_state')) {
                $leads->where('lead_active_state', 'active');
            }
        }

        //filters: id
        if (request()->filled('filter_lead_id')) {
            $leads->where('lead_id', request('filter_lead_id'));
        }
        if (is_numeric($id)) {
            $leads->where('lead_id', $id);
        }

        //do not show items that not yet ready (i.e exclude items in the process of being cloned that have status 'invisible')
        $leads->where('lead_visibility', 'visible');

        //filter archived leads
        if (request()->filled('filter_lead_state') && (request('filter_lead_state') == 'active' || request('filter_lead_state') == 'archived')) {
            $leads->where('lead_active_state', request('filter_lead_state'));
        }

        //filter: added date (start)
        if (request()->filled('filter_lead_created_start')) {
            $leads->where('lead_created', '>=', request('filter_lead_created_start'));
        }

        //filter: added date (end)
        if (request()->filled('filter_lead_created_end')) {
            $leads->where('lead_created', '<=', request('filter_lead_created_end'));
        }

        //filter: last contacted date (start)
        if (request()->filled('filter_lead_last_contacted_start')) {
            $leads->where('lead_last_contacted', '>=', request('filter_lead_last_contacted_start'));
        }

        //filter: last contacted date (end)
        if (request()->filled('filter_lead_last_contacted_end')) {
            $leads->where('lead_last_contacted', '<=', request('filter_lead_last_contacted_end'));
        }

        //filter: value (min)
        if (request()->filled('filter_lead_value_min')) {
            $leads->where('lead_value', '>=', request('filter_lead_value_min'));
        }

        //filter: value (max)
        if (request()->filled('filter_lead_value_max')) {
            $leads->where('lead_value', '<=', request('filter_lead_value_max'));
        }

        //filter: board
        if (request()->filled('filter_single_lead_status')) {
            $leads->where('lead_status', request('filter_single_lead_status'));
        }

        //filter status
        if (is_numeric(request('filter_lead_status'))) {
            $leads->where('lead_status', request('filter_lead_status'));
        }
        if (is_array(request('filter_lead_status')) && !empty(array_filter(request('filter_lead_status')))) {
            $leads->whereIn('lead_status', request('filter_lead_status'));
        }

        //filter assigned
       /* if (is_array(request('filter_assigned')) && !empty(array_filter(request('filter_assigned')))) {
            $leads->whereHas('assigned', function ($query) {
                $query->whereIn('leadsassigned_userid', request('filter_assigned'));
            });
        }*/

        //filter my leads (using the actions button)
        /*if (request()->filled('filter_my_leads')) {
            //leads assigned to me
            $leads->whereHas('assigned', function ($query) {
                $query->whereIn('leadsassigned_userid', [auth()->id()]);
            });
        }*/

        //filter: tags
        if (is_array(request('filter_tags')) && !empty(array_filter(request('filter_tags')))) {
            $leads->whereHas('tags', function ($query) {
                $query->whereIn('tag_title', request('filter_tags'));
            });
        }

        //search: various client columns and relationships (where first, then wherehas)
        if (request()->filled('search_query') || request()->filled('query')) {
            $leads->where(function ($query) {
                $query->Where('lead_id', '=', request('search_query'));
                $query->orWhere('lead_created', 'LIKE', '%' . date('Y-m-d', strtotime(request('search_query'))) . '%');
                $query->orWhere('lead_last_contacted', 'LIKE', '%' . date('Y-m-d', strtotime(request('search_query'))) . '%');
                $query->orWhereRaw("YEAR(lead_created) = ?", [request('search_query')]); //example binding
                $query->orWhereRaw("YEAR(lead_last_contacted) = ?", [request('search_query')]); //example binding
                $query->orWhere('lead_title', 'LIKE', '%' . request('search_query') . '%');
                /*$query->orWhere('lead_firstname', 'LIKE', '%' . request('search_query') . '%');
                $query->orWhere('lead_lastname', 'LIKE', '%' . request('search_query') . '%');*/
                $query->orWhere('lead_email', '=', request('search_query'));
                $query->orWhere('lead_company_name', 'LIKE', '%' . request('search_query') . '%');
                $query->orWhere('lead_street', 'LIKE', '%' . request('search_query') . '%');
                $query->orWhere('lead_city', 'LIKE', '%' . request('search_query') . '%');
                $query->orWhere('lead_state', 'LIKE', '%' . request('search_query') . '%');
                $query->orWhere('lead_phone', 'LIKE', '%' . request('search_query') . '%');
                $query->orWhere('lead_custom_field_5', 'LIKE', '%' . request('search_query') . '%');
                $query->orWhere('lead_custom_field_2', 'LIKE', '%' . request('search_query') . '%');
                $query->orWhere('lead_zip', 'LIKE', '%' . request('search_query') . '%');
                $query->orWhere('lead_country', '=', request('search_query'));
                $query->orWhere('lead_source', '=', request('search_query'));
                $query->orWhere('lead_value', '=', request('search_query'));
                $query->orWhere('lead_status', '=', request('search_query'));
                $query->orWhereHas('tags', function ($q) {
                    $q->where('tag_title', 'LIKE', '%' . request('search_query') . '%');
                });
            });
       
        }

       /* }else{
            $leads->where(function ($query) {
                $query->Where(DB::raw("lower(CONCAT(lead_firstname,' ',lead_lastname))"), '=', mb_strtolower(request('search_query')));
            });
        }*/

        //sorting
        if (in_array(request('sortorder'), array('desc', 'asc')) && request('orderby') != '') {
            //direct column name
            if (Schema::hasColumn('leads', request('orderby'))) {
                $leads->orderBy(request('orderby'), request('sortorder'));
            }
            //others
            switch (request('orderby')) {
            case 'status':
                $leads->orderBy('leadstatus_title', request('sortorder'));
                break;
            }
        } else {
            //default sorting
            if (request('query_type') == 'kanban') {
                $leads->orderBy('lead_position', 'asc');
            } else {
                $leads->orderBy('lead_id', 'desc');
            }
        }

        //eager load
        $leads->with([
            'tags',
            'leadstatus',
            'attachments',
            'assigned',
        ]);

        //count relationships
        $leads->withCount([
            'tags',
            'comments',
            'attachments',
            'checklists',
        ]);

        // Get the results and return them.
        return $leads->paginate(config('system.settings_system_pagination_limits'));
    }
    
    
    
     public function searchLimited($id = '') {

        $leads = $this->leads->newQuery();

        //joins
        $leads->leftJoin('categories', 'categories.category_id', '=', 'leads.lead_categoryid');
       // $leads->leftJoin('users', 'users.id', '=', 'leads.lead_creatorid');
        $leads->leftJoin('leads_status', 'leads_status.leadstatus_id', '=', 'leads.lead_status');

        // select all
        $leads->selectRaw('*');

        //count unread notifications
        $leads->selectRaw('(SELECT COUNT(*)
                                      FROM events_tracking
                                      LEFT JOIN events ON events.event_id = events_tracking.eventtracking_eventid
                                      WHERE eventtracking_userid = ' . auth()->id() . '
                                      AND events_tracking.eventtracking_status = "unread"
                                      AND events.event_parent_type = "lead"
                                      AND events.eventresource_id = leads.lead_id
                                      AND events.event_item = "comment")
                                      AS count_unread_comments');

        //count unread notifications
        $leads->selectRaw('(SELECT COUNT(*)
                                      FROM events_tracking
                                      LEFT JOIN events ON events.event_id = events_tracking.eventtracking_eventid
                                      WHERE eventtracking_userid = ' . auth()->id() . '
                                      AND events_tracking.eventtracking_status = "unread"
                                      AND events.event_parent_type = "lead"
                                      AND events.event_parent_id = leads.lead_id
                                      AND events.event_item = "attachment")
                                      AS count_unread_attachments');
        //converted by details
        $leads->selectRaw('(SELECT first_name
                                      FROM users
                                      WHERE users.id = leads.lead_converted_by_userid)
                                      AS converted_by_first_name');
        //converted by details
        $leads->selectRaw('(SELECT last_name
                                      FROM users
                                      WHERE users.id = leads.lead_converted_by_userid)
                                      AS converted_by_last_name');
        $hoy=date('y-m-d');
        $newfecha= date("Y-m-d",strtotime($hoy."- 14 days"));
        
        //default where
        $leads->whereRaw("1 = 1");
        $leads->Where('lead_created', '>=', $newfecha);

        //filter for active or archived (default to active) - do not use this when a lead id has been specified
        if (!is_numeric($id)) {
            if (!request()->filled('filter_show_archived_leads') && !request()->filled('filter_lead_state')) {
                $leads->where('lead_active_state', 'active');
            }
        }

        //filters: id
        if (request()->filled('filter_lead_id')) {
            $leads->where('lead_id', request('filter_lead_id'));
        }
        if (is_numeric($id)) {
            $leads->where('lead_id', $id);
        }

        //do not show items that not yet ready (i.e exclude items in the process of being cloned that have status 'invisible')
        $leads->where('lead_visibility', 'visible');

        //filter archived leads
        if (request()->filled('filter_lead_state') && (request('filter_lead_state') == 'active' || request('filter_lead_state') == 'archived')) {
            $leads->where('lead_active_state', request('filter_lead_state'));
        }

        //filter: added date (start)
        if (request()->filled('filter_lead_created_start')) {
            $leads->where('lead_created', '>=', request('filter_lead_created_start'));
        }

        //filter: added date (end)
        if (request()->filled('filter_lead_created_end')) {
            $leads->where('lead_created', '<=', request('filter_lead_created_end'));
        }

        //filter: last contacted date (start)
        if (request()->filled('filter_lead_last_contacted_start')) {
            $leads->where('lead_last_contacted', '>=', request('filter_lead_last_contacted_start'));
        }

        //filter: last contacted date (end)
        if (request()->filled('filter_lead_last_contacted_end')) {
            $leads->where('lead_last_contacted', '<=', request('filter_lead_last_contacted_end'));
        }

        //filter: value (min)
        if (request()->filled('filter_lead_value_min')) {
            $leads->where('lead_value', '>=', request('filter_lead_value_min'));
        }

        //filter: value (max)
        if (request()->filled('filter_lead_value_max')) {
            $leads->where('lead_value', '<=', request('filter_lead_value_max'));
        }

        //filter: board
        if (request()->filled('filter_single_lead_status')) {
            $leads->where('lead_status', request('filter_single_lead_status'));
        }

        //filter status
        if (is_numeric(request('filter_lead_status'))) {
            $leads->where('lead_status', request('filter_lead_status'));
        }
        if (is_array(request('filter_lead_status')) && !empty(array_filter(request('filter_lead_status')))) {
            $leads->whereIn('lead_status', request('filter_lead_status'));
        }

        //filter assigned
       /* if (is_array(request('filter_assigned')) && !empty(array_filter(request('filter_assigned')))) {
            $leads->whereHas('assigned', function ($query) {
                $query->whereIn('leadsassigned_userid', request('filter_assigned'));
            });
        }*/

        //filter my leads (using the actions button)
        /*if (request()->filled('filter_my_leads')) {
            //leads assigned to me
            $leads->whereHas('assigned', function ($query) {
                $query->whereIn('leadsassigned_userid', [auth()->id()]);
            });
        }*/

        //filter: tags
        if (is_array(request('filter_tags')) && !empty(array_filter(request('filter_tags')))) {
            $leads->whereHas('tags', function ($query) {
                $query->whereIn('tag_title', request('filter_tags'));
            });
        }

        //search: various client columns and relationships (where first, then wherehas)
       
        
        if (request()->filled('search_query') || request()->filled('query')) {
            $leads->where(function ($query) {
                $query->Where('lead_id', '=', request('search_query'));
                $query->orWhere('lead_created', 'LIKE', '%' . date('Y-m-d', strtotime(request('search_query'))) . '%');
                $query->orWhere('lead_last_contacted', 'LIKE', '%' . date('Y-m-d', strtotime(request('search_query'))) . '%');
                $query->orWhereRaw("YEAR(lead_created) = ?", [request('search_query')]); //example binding
                $query->orWhereRaw("YEAR(lead_last_contacted) = ?", [request('search_query')]); //example binding
                $query->orWhere('lead_title', 'LIKE', '%' . request('search_query') . '%');
                /*$query->orWhere('lead_firstname', 'LIKE', '%' . request('search_query') . '%');
                $query->orWhere('lead_lastname', 'LIKE', '%' . request('search_query') . '%');*/
                $query->orWhere('lead_email', '=', request('search_query'));
                $query->orWhere('lead_company_name', 'LIKE', '%' . request('search_query') . '%');
                $query->orWhere('lead_street', 'LIKE', '%' . request('search_query') . '%');
                $query->orWhere('lead_city', 'LIKE', '%' . request('search_query') . '%');
                $query->orWhere('lead_state', 'LIKE', '%' . request('search_query') . '%');
                $query->orWhere('lead_custom_field_5', 'LIKE', '%' . request('search_query') . '%');
                $query->orWhere('lead_custom_field_2', 'LIKE', '%' . request('search_query') . '%');
                $query->orWhere('lead_zip', 'LIKE', '%' . request('search_query') . '%');
                $query->orWhere('lead_phone', 'LIKE', '%' . request('search_query') . '%');
                $query->orWhere('lead_country', '=', request('search_query'));
                $query->orWhere('lead_source', '=', request('search_query'));
                $query->orWhere('lead_value', '=', request('search_query'));
                $query->orWhere('lead_status', '=', request('search_query'));
                $query->orWhereHas('tags', function ($q) {
                    $q->where('tag_title', 'LIKE', '%' . request('search_query') . '%');
                });
            });
       
        }
       
      
        
        
        
        //sorting
        if (in_array(request('sortorder'), array('desc', 'asc')) && request('orderby') != '') {
            //direct column name
            if (Schema::hasColumn('leads', request('orderby'))) {
                $leads->orderBy(request('orderby'), request('sortorder'));
            }
            //others
            switch (request('orderby')) {
            case 'status':
                $leads->orderBy('leadstatus_title', request('sortorder'));
                break;
            }
        } else {
            //default sorting
            if (request('query_type') == 'kanban') {
                $leads->orderBy('lead_position', 'asc');
            } else {
                $leads->orderBy('lead_id', 'desc');
            }
        }

        //eager load
        $leads->with([
            'tags',
            'leadstatus',
            'attachments',
            'assigned',
        ]);

        //count relationships
        $leads->withCount([
            'tags',
            'comments',
            'attachments',
            'checklists',
        ]);

        // Get the results and return them.
        return $leads->paginate(config('system.settings_system_pagination_limits'));
    }

    /**
     * Create a new record
     * @param array $position new record position
     * @return mixed object|bool
     */
    public function create($position = '') {

        //validate
        if (!is_numeric($position)) {
            Log::error("validation error - invalid params", ['process' => '[LeadRepository]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__, 'project_id' => 1]);
            return false;
        }

        //save new user
        $lead = new $this->leads;

        //data
        $lead->lead_creatorid = auth()->id();
        $lead->lead_firstname = request('lead_firstname');
        $lead->lead_lastname = request('lead_lastname');
        $lead->lead_email = request('lead_email');
        $lead->lead_phone = request('lead_phone');
        $lead->lead_job_position = request('lead_job_position');
        $lead->lead_company_name = request('lead_company_name');
        $lead->lead_website = request('lead_website');
        $lead->lead_street = request('lead_street');
        $lead->lead_city = request('lead_city');
        $lead->lead_state = request('lead_state');
        $lead->lead_zip = request('lead_zip');
        $lead->lead_country = request('lead_country');
        $lead->lead_source = request('lead_source');
        $lead->lead_title = request('lead_title');
        $lead->lead_description = request('lead_description');
        $lead->lead_value = request('lead_value');
        $lead->lead_last_contacted = request('lead_last_contacted'); //or \Carbon\Carbon::now()
        $lead->lead_status = request('lead_status');
        $lead->lead_position = $position;
        $lead->lead_categoryid = request('lead_categoryid');


        //apply custom fields data
        $this->applyCustomFields($lead);

        //save and return id
        if ($lead->save()) {
            return $lead->lead_id;
        } else {
            return false;
        }
    }

    /**
     * update a record
     * @param int $id record id
     * @return mixed int|bool
     */
    public function update($id) {

        //get the record
        if (!$lead = $this->leads->find($id)) {
            Log::error("record could not be found", ['process' => '[LeadAssignedRepository]', config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__, 'lead_id' => $id ?? '']);
            return false;
        }

        //last updated
        $lead->lead_updatorid = auth()->id();

        //general
        $lead->lead_firstname = request('lead_firstname');
        $lead->lead_lastname = request('lead_lastname');
        $lead->lead_email = request('lead_email');
        $lead->lead_phone = request('lead_phone');
        $lead->lead_job_position = request('lead_job_position');
        $lead->lead_company_name = request('lead_company_name');
        $lead->lead_website = request('lead_website');
        $lead->lead_street = request('lead_street');
        $lead->lead_city = request('lead_city');
        $lead->lead_state = request('lead_state');
        $lead->lead_zip = request('lead_zip');
        $lead->lead_country = request('lead_country');
        $lead->lead_source = request('lead_source');
        $lead->lead_title = request('lead_title');
        $lead->lead_description = request('lead_description');
        $lead->lead_value = request('lead_value');
        $lead->lead_last_contacted = request('lead_last_contacted');
        $lead->lead_status = request('lead_status');

        //apply custom fields data
        $this->applyCustomFields($lead);

        //save
        if ($lead->save()) {
            return $lead->lead_id;
        } else {
            return false;
        }
    }

    /**
     * feed for leads
     * @param string $status lead status
     * @param string $limit assigned|null limit to leads assiged to auth() user
     * @param string $searchterm
     * @return array
     */
    public function autocompleteFeed($status = '', $limit = '', $searchterm = '') {

        //validation
        if ($searchterm == '') {
            return [];
        }

        //start
        $query = $this->leads->newQuery();
        $query->selectRaw("lead_title AS value, lead_id AS id");

        //[filter] lead status
        if ($status != '') {
            if ($status == 'active') {
                $query->where('lead_status', '!=', 'completed');
            } else {
                $query->where('lead_status', '=', $status);
            }
        }

        //[filter] search term
        $query->where('lead_title', 'like', '%' . $searchterm . '%');

        //[filter] assigned
        if ($limit == 'assigned') {
            $leads->whereHas('assigned', function ($query) {
                $query->whereIn('leadsassigned_userid', auth()->user()->id);
            });
        }

        //return
        return $query->get();
    }

    /**
     * update model wit custom fields data (where enabled)
     */
    public function applyCustomFields($lead) {

        //custom fields
        $fields = \App\Models\CustomField::Where('customfields_type', 'leads')->get();
        foreach ($fields as $field) {
            if ($field->customfields_status == 'enabled') {
                switch ($field->customfields_name) {
                case 'lead_custom_field_1':
                    $lead->lead_custom_field_1 = request('lead_custom_field_1');
                    break;
                case 'lead_custom_field_2':
                    $lead->lead_custom_field_2 = request('lead_custom_field_2');
                    break;
                case 'lead_custom_field_3':
                    $lead->lead_custom_field_3 = request('lead_custom_field_3');
                    break;
                case 'lead_custom_field_4':
                    $lead->lead_custom_field_4 = request('lead_custom_field_4');
                    break;
                case 'lead_custom_field_5':
                    $lead->lead_custom_field_5 = request('lead_custom_field_5');
                    break;
                case 'lead_custom_field_6':
                    $lead->lead_custom_field_6 = request('lead_custom_field_6');
                    break;
                case 'lead_custom_field_7':
                    $lead->lead_custom_field_7 = request('lead_custom_field_7');
                    break;
                case 'lead_custom_field_8':
                    $lead->lead_custom_field_8 = request('lead_custom_field_8');
                    break;
                case 'lead_custom_field_9':
                    $lead->lead_custom_field_9 = request('lead_custom_field_9');
                    break;
                case 'lead_custom_field_10':
                    $lead->lead_custom_field_10 = request('lead_custom_field_10');
                    break;
                }
            }
        }
    }
}