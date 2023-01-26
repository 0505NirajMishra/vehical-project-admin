<!--begin::Card body-->
<div class="card-body">

    <!--begin::Input group-->

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_registration_no_title', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::text('vehical_registration_no', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.vehical_registration_no', 1)]) !!}
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.location_title', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::text('location', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.location', 1)]) !!}
        </div>

    </div>

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.longitude_title', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::text('longitude', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.longitude', 1)]) !!}
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.latitude_title', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::text('latitude', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.latitude', 1)]) !!}
        </div>

    </div>

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.fuel_type_title', 1) }}</label>

        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="fuel_type">
                <option value=""> Please select fule type</option>
                <option value="petrol">Petrol</option>
                <option value="diesel">Diesel</option>
                <option value="compressednaturalgas">Compressed Natural Gas</option>
                <option value="bio-diesel">Bio-Diesel</option>
                <option value="liquidpetroleumgas">Liquid Petroleum Gas</option>
                <option value="ethanolormethanol">Ethanol or Methanol</option>
            </select>
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_type_title', 1) }}</label>

        <div class="col-lg-4 fv-row">

            <select class="form-control form-control-solid" name="vehical_type">
                    <option value=""> select vehical category type</option>
                    @foreach($vehicalcategorys as $data)
                        <option value="{{$data->vehical_type}}">{{$data->vehical_type}}</option>
                    @endforeach
            </select>

        </div>

        </div>

        <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.fuel_quantity_title', 1) }}</label>

        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="fuel_quantity">
            <option value=""> Please fuel quantity</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
            </select>
        </div>


        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_image_title', 1) }}</label>

        <div class="col-lg-4 fv-row">
            <input type="file" class="form-control form-control-lg form-control-solid" name="vehical_image" accept=".png, .jpg, .jpeg">
        </div>

    </div>

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.description_title', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::textarea('description', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.description', 1)]) !!}
        </div>


    </div>

    <!--end::Input group-->

</div>
<!--end::Card body-->

@push('scripts')

    <script>

    <link   href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link   href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
        $(function(){
            $('.datetimepicker').datetimepicker();
        });
    </script>

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\PetroldesielRequest', 'form') !!}

@endpush