<!--begin::Card body-->
<div class="card-body">

    <!--begin::Input group-->

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_photo_title', 1) }}</label>

        <div class="col-lg-4 fv-row">
                <input type="file" class="form-control form-control-lg form-control-solid" name="vehical_photo" accept=".png, .jpg, .jpeg">
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.description_title', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::text('description', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.description', 1)]) !!}
        </div>

    </div>

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_type_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="vehical_type">
              <option value=""> Please select vehical type</option>
              <option value="bike">Bike</option>
              <option value="car">Car</option>
              <option value="pickup">Pickup</option>
              <option value="van">Van</option>
              <option value="truck">truck</option>
            </select>
        </div>
        
        <label class="col-lg-2 col-form-label fw-bold fs-6">{{ trans_choice('content.vehical_registration_no_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::text('vehical_registration_no', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.vehical_registration_no', 1)]) !!}
        </div>

    </div>

    <div class="row mb-6">
              
        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.service_location_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::text('service_location', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.service_location', 1)]) !!}
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.service_longitude_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::text('service_longitude', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.service_longitude', 1)]) !!}
        </div>

    </div>

    <div class="row mb-6">
        
        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.service_latitude_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::text('service_latitude', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.service_latitude', 1)]) !!}
        </div>

    </div>

</div>
<!--end::Card body-->

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\KeyunlockRequest', 'form') !!}
@endpush