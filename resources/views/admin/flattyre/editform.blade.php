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

            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_type_title', 1) }}</label>

            <div class="col-lg-4 fv-row">

                <select class="form-control form-control-solid" name="vehical_type">
                        <option value=""> select vehical category type</option>
                        @foreach($data as $d1)
                            <option value="{{$d1->vehical_type}}" {{ $d1->vehical_type == $d1->vehical_type ? 'selected' : '' }} >{{$d1->vehical_type}}</option>
                        @endforeach
                </select>

            </div>

            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.tube_tyre_title', 1) }}</label>

            <div class="col-lg-4 fv-row">

                <select class="form-control form-control-solid" name="tube_tyre">
                        <option value=""> select tyre tube</option>
                        <option value="tube" {{ $flattyre->tube_tyre=="tube" ? 'selected':''}}>tube</option>
                        <option value="tubeless" {{ $flattyre->tube_tyre=="tubeless" ? 'selected':''}}>tubeless</option>
                </select>

            </div>

        </div>

        <div class="row mb-6">

            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.tyresize_image_title', 1) }}</label>

            <div class="col-lg-4 fv-row">
                @if($flattyre->flattyre_id)
                    <input type="file" class="form-control form-control-lg form-control-solid" name="tyresize_image" accept=".png, .jpg, .jpeg">
                    <img src="{{ url('/') }}/vehicalcategory/image/{{$flattyre->tyresize_image}}" height="50">
                @else
                    <input type="file" class="form-control form-control-lg form-control-solid" name="tyresize_image" accept=".png, .jpg, .jpeg">
                @endif
            </div>

            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.tyre_width_title', 1) }}</label>

            <div class="col-lg-4 fv-row">
                {!! Form::text('tyre_width', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.tyre_width', 1)]) !!}
            </div>

        </div>

        <div class="row mb-6">
            
            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.tyre_wheel_size_title', 1) }}</label>

            <div class="col-lg-4 fv-row">
                {!! Form::text('tyre_wheel_size', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.tyre_wheel_size', 1)]) !!}
            </div>

            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.tyre_speed_rating_title', 1) }}</label>

            <div class="col-lg-4 fv-row">
                {!! Form::text('tyre_speed_rating', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.tyre_speed_rating', 1)]) !!}
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
    {!! JsValidator::formRequest('App\Http\Requests\Admin\flattyreRequest', 'form') !!}

@endpush