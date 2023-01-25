<!--begin::Card body-->
<div class="card-body">
    
    <div class="row mb-6">

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_logo_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
            @if($vehicaltype->vehical_catgeory_id)
                <input type="file" class="form-control form-control-lg form-control-solid" name="vehical_logo" accept=".png, .jpg, .jpeg">
                <img src="{{ url('/') }}/vehicalcategory/image/{{$vehicaltype->vehical_logo}}" height="50">
            @else
                <input type="file" class="form-control form-control-lg form-control-solid" name="vehical_logo" accept=".png, .jpg, .jpeg">
            @endif
        </div>
       
        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_type_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::text('vehical_type', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.vehical_type', 1)]) !!}
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_name_title', 1) }}</label>

        <div class="col-lg-4 fv-row">
                {!! Form::text('vehical_name', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.vehical_name', 1)]) !!}
        </div>

    </div>
    
</div>

<!--end::Card body-->

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\VehicalCategoryRequest', 'form') !!}
@endpush