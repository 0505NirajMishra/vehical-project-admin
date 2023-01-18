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
       
        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.vehical_type_name_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
            <select class="form-control form-control-solid" name="vehical_type_name">
              <option value=""> Please select category type</option>
              <option value="bike" {{ $vehicaltype->vehical_type_name == 'bike' ?  'selected':'' }} >Bike</option>
              <option value="car" {{ $vehicaltype->vehical_type_name == 'car' ?  'selected':'' }} >Car</option>
              <option value="pickup" {{ $vehicaltype->vehical_type_name == 'pickup' ?  'selected':'' }} >Pickup</option>
              <option value="van" {{ $vehicaltype->vehical_type_name == 'van' ?  'selected':'' }} >Van</option>
            </select>
        </div>

    </div>
    
</div>

<!--end::Card body-->


@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\VehicalCategoryRequest', 'form') !!}
@endpush