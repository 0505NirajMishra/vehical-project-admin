<!--begin::Card body-->
<div class="card-body">

    <!--begin::Input group-->

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.booking_date_time_title', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::text('booking_date_time', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid datetimepicker', 'placeholder' => trans_choice('content.booking_date_time', 1)]) !!}
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.description_title', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::text('description', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.description', 1)]) !!}
        </div>

    </div>

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.service_type_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="service_name">
                     <option value=""> Please service type</option>
                     @foreach($data1 as $s1)
                         <option value="{{$s1->service_name}}" {{ $s1->service_name == $s1->service_name ? 'selected' : '' }} >{{$s1->service_name}}</option>
                     @endforeach
            </select>
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.tyre_type_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="tyre_type">
              <option value=""> Please select tyre type</option>
              <option value="tube" {{ $feedback->tyre_type=='tube' ? 'selected':'' }} >Tube</option>
              <option value="tubeless" {{ $feedback->tyre_type=='tubeless' ? 'selected':'' }} >Tubeless</option>
            </select>
        </div>

    </div>

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_type_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
           
            <select class="form-control form-control-solid" name="vehical_type">
                    <option value=""> select vehical type</option>
                    @foreach($data as $d1)
                        <option value="{{$d1->vehical_type}}"  {{ $d1->vehical_type == $d1->vehical_type ? 'selected':'' }} >{{$d1->vehical_type}}</option>
                    @endforeach
            </select>

        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.service_status_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="service_status">
              <option value=""> Please select service status</option>
              <option value="process" {{ $feedback->service_status=='process' ? 'selected':'' }} >Process</option>
              <option value="confirm" {{ $feedback->service_status=='confirm' ? 'selected':'' }} >Confirm</option>
              <option value="cancel" {{ $feedback->service_status=='cancel' ? 'selected':'' }} >Cancel</option>
            </select>
        </div>

    </div>

    <div class="row mb-6">
              
        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.cust_detail_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::text('cust_detail', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.cust_detail', 1)]) !!}
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.shop_detail_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::text('shop_detail', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.shop_detail', 1)]) !!}
        </div>

    </div>

    <div class="row mb-6">
        
        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.calling_status_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="calling_status">
              <option value="">Please select service status</option>
              <option value="receive" {{ $feedback->calling_status=='receive' ? 'selected':'' }} >Receive</option>
              <option value="notreceive" {{ $feedback->calling_status=='notreceive' ? 'selected':'' }} >Not Receive</option>
              <option value="unreachedable" {{ $feedback->calling_status=='unreachedable' ? 'selected':'' }} >Unrreachedable</option>
            </select>
        </div>
        

        <label class="col-lg-2 col-form-label fw-bold fs-6">{{ trans_choice('content.next_call_date_time_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::text('next_call_date_time', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid datetimepicker', 'placeholder' => trans_choice('content.next_call_date_time', 1)]) !!}
        </div>

    </div>

</div>
<!--end::Card body-->


@push('scripts')
    
    <script>

    <link   href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link   href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

        $(function () {
               $('.datetimepicker').datetimepicker();
        });

    </script>

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\FeedbackRequest', 'form') !!}

@endpush