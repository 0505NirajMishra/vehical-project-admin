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
                <option value="petrol" {{ $petroldesial->fuel_type == 'petrol' ? 'selected':'' }} >Petrol</option>
                <option value="diesel" {{ $petroldesial->fuel_type == 'diesel' ? 'selected':'' }} >Diesel</option>
                <option value="compressednaturalgas" {{ $petroldesial->fuel_type == 'compressednaturalgas' ? 'selected':'' }} >Compressed Natural Gas</option>
                <option value="bio-diesel" {{ $petroldesial->fuel_type == 'bio-diesel' ? 'selected':'' }} >Bio-Diesel</option>
                <option value="liquidpetroleumgas" {{ $petroldesial->fuel_type == 'liquidpetroleumgas' ? 'selected':'' }} >Liquid Petroleum Gas</option>
                <option value="ethanolormethanol" {{ $petroldesial->fuel_type == 'ethanolormethanol' ? 'selected':'' }} >Ethanol or Methanol</option>
            </select>
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_type_title', 1) }}</label>

        <div class="col-lg-4 fv-row">

            <select class="form-control form-control-solid" name="vehical_type">
                     <option value=""> Please vehical type</option>
                     @foreach($data as $d1)
                         <option value="{{$d1->vehical_type}}" {{ $d1->vehical_type == $d1->vehical_type ? 'selected' : '' }} >{{$d1->vehical_type}}</option>
                     @endforeach
            </select>

        </div>

        </div>

        <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.fuel_quantity_title', 1) }}</label>

        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="fuel_quantity">
            <option value=""> Please fuel quantity</option>
            <option value="5"  {{ $petroldesial->fuel_quantity == '5' ? 'selected':'' }} >5</option>
            <option value="10" {{ $petroldesial->fuel_quantity == '10' ? 'selected':'' }} >10</option>
            <option value="15" {{ $petroldesial->fuel_quantity == '15' ? 'selected':'' }} >15</option>
            <option value="20" {{ $petroldesial->fuel_quantity == '20' ? 'selected':'' }} >20</option>
            </select>
        </div>


        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_image_title', 1) }}</label>

        <div class="col-lg-4 fv-row">

            @if($petroldesial->petrol_id)
                <input type="file" class="form-control form-control-lg form-control-solid" name="vehical_image" accept=".png, .jpg, .jpeg">
                <img src="{{ url('/') }}/vehicalcategory/image/{{$petroldesial->vehical_image}}" height="50">
            @else
                <input type="file" class="form-control form-control-lg form-control-solid" name="vehical_image" accept=".png, .jpg, .jpeg">
            @endif

            
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