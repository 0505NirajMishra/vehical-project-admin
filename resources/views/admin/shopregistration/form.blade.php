<!--begin::Card body-->

<div class="card-body">
    
    <div class="row mb-6">  

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.company_name_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::text('company_name', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.company_name', 1)]) !!}
        </div>

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.gst_no_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::text('gst_no', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.gst_no', 1)]) !!}
        </div>

    </div>

    <div class="row mb-6">  

            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.owner_name_title', 1) }}</label>
        
            <div class="col-lg-4 fv-row">
                    {!! Form::text('owner_name', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.owner_name', 1)]) !!}
            </div>

            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.address_title', 1) }}</label>
        
            <div class="col-lg-4 fv-row">
                    {!! Form::textarea('address', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.address', 1)]) !!}
            </div>
    </div>

    <div class="row mb-6">  

            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.email_title', 1) }}</label>
        
            <div class="col-lg-4 fv-row">
                    {!! Form::text('email', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.email', 1)]) !!}
            </div>

            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.mobile_title', 1) }}</label>
        
            <div class="col-lg-4 fv-row">
                    {!! Form::text('mobile', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.mobile', 1)]) !!}
            </div>
    </div>

    <div class="row mb-6">  

            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.year_of_exper_title', 1) }}</label>
        
            <div class="col-lg-4 fv-row">
                    {!! Form::text('year_of_exper', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.year_of_exper', 1)]) !!}
            </div>

            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.about_you_title', 1) }}</label>
        
            <div class="col-lg-4 fv-row">
                    {!! Form::text('about_you', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.about_you', 1)]) !!}
            </div>

    </div>
    
    <div class="row mb-6">  

            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.password_title', 1) }}</label>
        
            <div class="col-lg-4 fv-row">
                      <input type="password" class="form-control form-control-lg form-control-solid" name="password" placeholder="password">
            </div>
            
            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.c_password_title', 1) }}</label>
        
            <div class="col-lg-4 fv-row">
                      <input type="password" class="form-control form-control-lg form-control-solid" name="c_password" placeholder="confirm password">
            </div>

    </div>
    
    <div class="row mb-6">  
            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.work_place_photo_title', 1) }}</label>
        
            <div class="col-lg-4 fv-row">
                  <input type="file" class="form-control form-control-lg form-control-solid" name="work_place_photo" accept=".png, .jpg, .jpeg">
            </div>

            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.profile_image_title', 1) }}</label>
        
            <div class="col-lg-4 fv-row">
                  <input type="file" class="form-control form-control-lg form-control-solid" name="profile_image" accept=".png, .jpg, .jpeg">
            </div>
    </div>
    
    <div class="row mb-6">  

            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.location_title', 1) }}</label>
        
            <div class="col-lg-4 fv-row">
                    {!! Form::text('location', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.location', 1)]) !!}
            </div>

            <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.longitude_title', 1) }}</label>
        
            <div class="col-lg-4 fv-row">
                    {!! Form::text('longitude', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.longitude', 1)]) !!}
            </div>

    </div>

    <div class="row mb-6">  

        <label class="col-lg-2 col-form-label required fw-bold fs-6">{{ trans_choice('content.latitude_title', 1) }}</label>
        
        <div class="col-lg-4 fv-row">
                {!! Form::text('latitude', null, ['min' => 2, 'max' => 6, 'value' => 2, 'class' => 'form-control form-control-lg form-control-solid', 'placeholder' => trans_choice('content.latitude', 1)]) !!}
        </div>

    </div>

    
</div>

<!--end::Card body-->

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\ShopRegistrationRequest', 'form') !!}
@endpush