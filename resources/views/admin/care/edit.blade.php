@extends('admin.layouts.base')
@section('content')
    
    @include('admin.layouts.components.header', [
        'title' => __('messages.edit', ['name' => trans_choice('content.care', 1)]),
        'breadcrumbs' => Breadcrumbs::render('admin.cares.edit'),
    ]) 
    
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Careers - Apply-->
            <div class="card">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Layout-->
                    <div class="d-flex flex-column flex-lg-row mb-17">
                        <!--begin::Content-->
                        <div class="flex-lg-row-fluid me-0 me-lg-20">
                            <!--begin::Form-->
                            {!! Form::model($care, ['method' => 'PATCH', 'route' => ['admin.cares.update', $care->care_id], 'class' => 'form mb-15', 'enctype' => 'multipart/form-data']) !!}
                            
                            @csrf
                            
                            <input type="hidden" name="id" value="{{ $care->care_id }}">
                            
                            @include('admin.care.editform')

                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <a href="{{ route('admin.cares.index') }}" class="btn btn-light btn-active-light-primary me-2 text-black">{{ __('content.back_title') }}</a>
                                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
                            </div>
                            <!--end::Actions--> 
                            {!! Form::close() !!}
                            <!--end::Form-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Layout-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Careers - Apply-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection