<!--begin::Card body-->
<div class="card-body">
    
    <!--begin::Input group-->

    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.service_name_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::text('service_name', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.service_name', 1)]) !!}
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.service_name_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
            @if($addservice->service_id)
                <input type="file" class="form-control form-control-lg form-control-solid" name="service_logo" accept=".png, .jpg, .jpeg">
                <img src="{{ url('/') }}/service/image/{{$addservice->service_logo}}" height="50">
            @else
                <input type="file" class="form-control form-control-lg form-control-solid" name="service_logo" accept=".png, .jpg, .jpeg">
            @endif   
        </div>

    </div>

    <!--end::Input group-->

</div>
<!--end::Card body-->


@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\AddServiceRequest', 'form') !!}
@endpush