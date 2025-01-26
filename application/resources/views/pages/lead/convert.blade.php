<div class="p-40">
    <h3>Matricular en SAEC</h3>
    <div class="line p-b-25"></div>

    <!--first name-->
    <div class="form-group row">
        <label
            class="col-sm-12 col-lg-3 text-left control-label col-form-label required">Nombres*</label>
        <div class="col-sm-12 col-lg-9">
            <input type="text" class="form-control form-control-sm" id="convert_lead_firstname" name="lead_firstname"
                placeholder="" value="{{ $lead->lead_lastname ?? '' }}">
        </div>
    </div>
    <!--last name-->
    <div class="form-group row">
        <label
            class="col-sm-12 col-lg-3 text-left control-label col-form-label required">Apellido Paterno*</label>
        <div class="col-sm-12 col-lg-9">
            <input type="text" class="form-control form-control-sm" id="convert_lead_lastname" name="lead_lastname"
                placeholder="" value="{{ $lead->lead_lastname ?? '' }}">
        </div>
    </div>

    <!--company name-->
    <div class="form-group row">
        <label
            class="col-sm-12 col-lg-3 text-left control-label col-form-label required">Apellido Materno*</label>
        <div class="col-sm-12 col-lg-9">
            <input type="text" class="form-control form-control-sm" id="convert_lead_materno"
                name="lead_materno" placeholder="" value="{{ $lead->lead_materno ?? '' }}">
        </div>
    </div>
    <div class="form-group row">
        <label
            class="col-sm-12 col-lg-3 text-left control-label col-form-label required">R.U.T*</label>
        <div class="col-sm-12 col-lg-9">
            <input type="text" class="form-control form-control-sm" id="convert_lead_rut" name="lead_rut" placeholder=""
                value="{{ $lead->lead_rut ?? '' }}">
        </div>
    </div>

    <!--email-->
    <div class="form-group row">
        <label
            class="col-sm-12 col-lg-3 text-left control-label col-form-label required">{{ cleanLang(__('lang.email_address')) }}*</label>
        <div class="col-sm-12 col-lg-9">
            <input type="text" class="form-control form-control-sm" id="convert_lead_email" name="lead_email" placeholder=""
                value="{{ $lead->lead_email ?? '' }}">
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-sm-12 col-lg-3 text-left control-label col-form-label">Sexo</label>
        <div class="col-sm-12 col-lg-9">
            <select class="select2-basic form-control form-control-sm" id="convert_lead_sexo" name="lead_sexo">
                <option "">Seleccione Sexo</option>
                <option "1">Masculino</option>
                <option "0">Femenino</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label
            class="col-sm-12 col-lg-3 text-left control-label col-form-label required">Fecha Nacimiento*</label>
        <div class="col-sm-12 col-lg-9">
            <input type="text" class="form-control form-control-sm" id="convert_lead_fenacimiento" name="lead_fnacimiento" placeholder=""
                value="{{ $lead->lead_fenacimiento ?? '' }}">
        </div>
    </div>

    <div class="line"></div>

    <!--telephone-->
    <div class="form-group row">
        <label class="col-sm-12 col-lg-3 text-left control-label col-form-label">{{ cleanLang(__('lang.telephone')) }}</label>
        <div class="col-sm-12 col-lg-9">
            <input type="text" class="form-control form-control-sm" id="convert_lead_phone" name="phone" placeholder=""
                value="{{ $lead->lead_phone ?? '' }}">
        </div>
    </div>

    <!--street-->
    <div class="form-group row">
        <label class="col-sm-12 col-lg-3 text-left control-label col-form-label">{{ cleanLang(__('lang.street')) }}</label>
        <div class="col-sm-12 col-lg-9">
            <input type="text" class="form-control form-control-sm" id="convert_lead_street" name="street"
                placeholder="" value="{{ $lead->lead_street ?? '' }}">
        </div>
    </div>
    <!--city-->
    <div class="form-group row">
        <label class="col-sm-12 col-lg-3 text-left control-label col-form-label">{{ cleanLang(__('lang.city')) }}</label>
        <div class="col-sm-12 col-lg-9">
            <input type="text" class="form-control form-control-sm" id="convert_lead_city" name="city" placeholder=""
                value="{{ $lead->lead_city ?? '' }}">
        </div>
    </div>
    <!--state-->
    <div class="form-group row">
        <label class="col-sm-12 col-lg-3 text-left control-label col-form-label">{{ cleanLang(__('lang.state')) }}</label>
        <div class="col-sm-12 col-lg-9">
            <input type="text" class="form-control form-control-sm" id="convert_lead_state" name="state" placeholder=""
                value="{{ $lead->lead_state ?? '' }}">
        </div>
    </div>
    <!--zip-->
    <div class="form-group row">
        <label class="col-sm-12 col-lg-3 text-left control-label col-form-label">Test Visual</label>
        <div class="col-sm-12 col-lg-9">
           <select class="select2-basic form-control form-control-sm" id="convert_lead_testvisual" name="lead_testvisual">
                <option "">Seleccione </option>
                <option "1">Si</option>
                <option "0">No</option>
            </select>
        </div>
    </div>
    <!--country-->
    <div class="form-group row">
        <label class="col-sm-12 col-lg-3 text-left control-label col-form-label">{{ cleanLang(__('lang.country')) }}</label>
        <div class="col-sm-12 col-lg-9">
            <select class="select2-basic form-control form-control-sm" id="convert_lead_country" name="country">
                <option></option>
                @include('misc.country-list')
            </select>
        </div>
    </div>
    <!--require-->
    <div class="row">
        <div class="col-12">
            <div><small><strong>* {{ cleanLang(__('lang.required')) }}</strong></small></div>
        </div>
    </div>
</div>