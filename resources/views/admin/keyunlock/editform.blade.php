<!--begin::Card body-->
<div class="card-body">

    <!--begin::Input group-->

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_photo_title', 1) }}</label>

        <div class="col-lg-4 fv-row">
            @if($keyunlock->keyunlocks_id)
                <input type="file" class="form-control form-control-lg form-control-solid" name="vehical_photo" accept=".png, .jpg, .jpeg">
                <img src="{{ url('/') }}/vehical/image/{{$keyunlock->vehical_photo}}" height="50">
            @else
                <input type="file" class="form-control form-control-lg form-control-solid" name="vehical_photo" accept=".png, .jpg, .jpeg">
            @endif
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
              <option value="bike" {{ $keyunlock->vehical_type=='bike' ? 'selected':'' }} >Bike</option>
              <option value="car" {{  $keyunlock->vehical_type=='car' ? 'selected':'' }} >Car</option>
              <option value="pickup" {{  $keyunlock->vehical_type=='pickup' ? 'selected':'' }} >Pickup</option>
              <option value="van" {{  $keyunlock->vehical_type=='van' ? 'selected':'' }} >Van</option>
              <option value="truck" {{  $keyunlock->vehical_type=='truck' ? 'selected':'' }} >truck</option>
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